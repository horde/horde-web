<?php
/**
 * PSR-15 diagnostics controller for hordeweb.
 *
 * Read-only probes into the feed / library cache so operators can verify
 * that:
 *
 *   1. The controllers and bin/hordeweb-fetch-feed resolve the same
 *      PSR-16 CacheInterface (i.e. cron warmups actually end up in the
 *      same backend the request path reads from).
 *   2. The known cache keys are populated, and the payloads unserialize
 *      to the expected types.
 *   3. A write from this request is readable within the same request
 *      (canary round-trip).
 *
 * Gated by a shared token in $GLOBALS['diag_token'] (set in hordeweb's
 * config/conf.php alongside $feed_url and $feed_timeout).
 * Unset or empty → the endpoint returns a plain 404 as if it did not
 * exist. This is deliberately not admin auth — the endpoint leaks
 * class names and payload sizes, not secrets, but it should still not
 * be discoverable to crawlers.
 *
 * Copyright 2026 Horde LLC (http://www.horde.org)
 *
 * @license  http://opensource.org/licenses/bsd-license.php BSD
 */

declare(strict_types=1);

namespace Horde\Hordeweb\Controller;

use Horde\Injector\Injector;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\SimpleCache\CacheInterface;
use Throwable;

class Diagnostics implements RequestHandlerInterface
{
    /**
     * Probes: cache keys we expect to find populated, mapped to a short
     * description used only for the JSON output. The keys must match
     * Home::CACHE_KEY_* / App::CACHE_KEY_APP_FEED_* / the
     * HordeWeb_Utils_Libraries prefixes.
     */
    private const PROBES = [
        'hordeweb.feed.planet.v2'          => 'Planet Horde feed (Home)',
        'hordeweb.feed.horde.v2'           => 'Horde news feed (Home)',
        'hordeweb.feed.app.imp.v2'         => 'Per-app feed sample (App, slug=imp)',
        'hordeweb.libraries.list.h6'       => 'Library list (h6)',
        'hordeweb.libraries.descriptions.h6' => 'Library descriptions (h6)',
    ];

    /** Canary key used to prove read-your-own-write inside this request. */
    private const CANARY_KEY = 'hordeweb.diag.canary';

    public function __construct(
        private readonly Injector $injector,
        private readonly ResponseFactoryInterface $responseFactory,
        private readonly StreamFactoryInterface $streamFactory,
    ) {}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $expectedToken = $GLOBALS['diag_token'] ?? null;
        if ($expectedToken === null || $expectedToken === '') {
            return $this->notFound();
        }
        $providedToken = $request->getQueryParams()['token'] ?? '';
        if (!is_string($providedToken) || !hash_equals((string) $expectedToken, $providedToken)) {
            return $this->notFound();
        }

        $cache = $this->injector->getInstance(CacheInterface::class);

        $out = [
            'ok' => true,
            'backend' => $this->describeBackend($cache),
            'probes' => [],
            'canary' => $this->canaryRoundTrip($cache),
        ];

        foreach (self::PROBES as $key => $description) {
            $out['probes'][$key] = $this->probe($cache, $key, $description);
        }

        return $this->json($out);
    }

    /**
     * Return the concrete class of the injected PSR-16 cache plus, where
     * available via reflection, the concrete storage layer inside it.
     * Everything else (Redis host, prefix) is not leaked — the goal is
     * only to prove "web and CLI resolve the same class."
     */
    private function describeBackend(CacheInterface $cache): array
    {
        $info = [
            'cache_class' => get_class($cache),
            'storage_class' => null,
        ];

        try {
            $ref = new \ReflectionObject($cache);
            foreach ($ref->getProperties(\ReflectionProperty::IS_PRIVATE | \ReflectionProperty::IS_PROTECTED) as $prop) {
                $name = strtolower($prop->getName());
                if (!str_contains($name, 'storage')) {
                    continue;
                }
                $prop->setAccessible(true);
                $value = $prop->getValue($cache);
                if (is_object($value)) {
                    $info['storage_class'] = get_class($value);
                    break;
                }
            }
        } catch (Throwable) {
            // Reflection is a best-effort diagnostic; a failure here
            // does not compromise the endpoint's core purpose.
        }

        return $info;
    }

    /**
     * Read one cache key. Report hit/miss, payload size, and — if the
     * payload is a serialize()d string — the class of the top-level
     * unserialized value. No payload contents are ever emitted.
     */
    private function probe(CacheInterface $cache, string $key, string $description): array
    {
        try {
            $value = $cache->get($key);
        } catch (Throwable $e) {
            return [
                'description' => $description,
                'error' => get_class($e) . ': ' . $e->getMessage(),
            ];
        }

        if ($value === null) {
            return [
                'description' => $description,
                'hit' => false,
            ];
        }

        $out = [
            'description' => $description,
            'hit' => true,
            'raw_type' => gettype($value),
            'raw_size_bytes' => is_string($value) ? strlen($value) : null,
        ];

        if (is_string($value)) {
            $unserialized = @unserialize($value);
            if ($unserialized === false && $value !== 'b:0;') {
                $out['payload'] = ['unserialize' => 'failed'];
            } else {
                $out['payload'] = [
                    'type' => gettype($unserialized),
                    'class' => is_object($unserialized) ? get_class($unserialized) : null,
                    'iterable' => is_iterable($unserialized),
                    'count' => is_countable($unserialized) ? count($unserialized) : null,
                ];
            }
        }

        return $out;
    }

    /**
     * Prove read-your-own-write. Uses hrtime() as the payload so
     * successive canaries never collide even on the same second.
     */
    private function canaryRoundTrip(CacheInterface $cache): array
    {
        $stamp = (string) hrtime(true);
        try {
            $cache->set(self::CANARY_KEY, $stamp, 60);
            $readback = $cache->get(self::CANARY_KEY);
        } catch (Throwable $e) {
            return [
                'ok' => false,
                'error' => get_class($e) . ': ' . $e->getMessage(),
            ];
        }

        return [
            'ok' => $readback === $stamp,
            'wrote' => $stamp,
            'read' => $readback,
        ];
    }

    private function json(array $data): ResponseInterface
    {
        $body = $this->streamFactory->createStream(
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n"
        );
        return $this->responseFactory->createResponse(200)
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Cache-Control', 'no-store')
            ->withBody($body);
    }

    private function notFound(): ResponseInterface
    {
        $body = $this->streamFactory->createStream("Not Found\n");
        return $this->responseFactory->createResponse(404)
            ->withHeader('Content-Type', 'text/plain')
            ->withBody($body);
    }
}
