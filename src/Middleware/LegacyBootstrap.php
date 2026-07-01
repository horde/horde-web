<?php
/**
 * Legacy bootstrap middleware for hordeweb
 *
 * Copyright 2026 Horde LLC (http://www.horde.org)
 */

declare(strict_types=1);

namespace Horde\Hordeweb\Middleware;

use Horde\Core\Uri\RoutesProvider;
use Horde\Routes\GroupMapper;
use Horde\Routes\Utils;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Require hordeweb's legacy app/lib/base.php before dispatching the
 * controller.
 *
 * Under hordeweb's own dispatch.php, base.php is included at boot and
 * installs:
 *
 *   - Horde_Registry::appInit (session, config, legacy autoloader)
 *   - PSR-0 class-path mappers for HordeWeb_* and legacy per-app
 *     directories (settings/, controllers/, lib/)
 *   - The bindFactory('HordeWeb_View', ...) call needed by the views
 *
 * Under horde/rampage.php none of that runs, so controllers that
 * reference legacy classes (Horde_PageOutput, HordeWeb_View,
 * HordeWeb_Script_File, ...) fail at construction time.
 *
 * This middleware runs before any hordeweb controller and require_once
 * the file, so the second and later invocations are cheap.
 *
 * It also binds a properly-populated Horde\Routes\Utils into the legacy
 * injector. Under rampage the routes live inside the RoutesProvider
 * (a GroupMapper) attached to the request; without the bind below, the
 * legacy injector would reflection-instantiate a fresh empty Mapper and
 * hand it to Utils, so every $view->urlWriter->urlFor(name, params)
 * call in a template would fall through to the bare-name query-string
 * fallback (yielding href="library?library=Horde_Date" and similar).
 *
 * Once every legacy dependency has been ported to PSR-4/DI and templates
 * switch to Horde\Core\Uri\RouteUrlWriter, this middleware can be
 * removed together with app/lib/base.php.
 */
class LegacyBootstrap implements MiddlewareInterface
{
    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler,
    ): ResponseInterface {
        require_once dirname(__DIR__, 2) . '/app/lib/base.php';

        // Bridge the populated GroupMapper into the legacy injector via a
        // Utils bound to it. The RoutesProvider that rampage stashed in
        // the legacy injector is the same GroupMapper that resolved this
        // request, so its named-route table is what templates need to see.
        $injector = $GLOBALS['injector'] ?? null;
        if ($injector !== null && $injector->has(RoutesProvider::class)) {
            $provider = $injector->getInstance(RoutesProvider::class);
            if ($provider instanceof GroupMapper) {
                $injector->setInstance(Utils::class, new Utils($provider));
            }
        }

        return $handler->handle($request);
    }
}
