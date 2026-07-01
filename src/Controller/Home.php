<?php
/**
 * Modern PSR-15 Home Controller
 *
 * Handles requests to the main home page using PSR-7/15 standards.
 *
 * Copyright 2011-2026 Horde LLC (http://www.horde.org)
 *
 * @license  http://opensource.org/licenses/bsd-license.php BSD
 * @author   Michael J Rubinsky <mrubinsk@horde.org>
 * @author   Ralf Lang <ralf.lang@ralf-lang.de>
 */

declare(strict_types=1);

namespace Horde\Hordeweb\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Log\LoggerInterface;
use Horde\Injector\Injector;
use Horde_Feed;
use Horde_Http_Client;
use HordeWeb_Utils;
use HordeWeb_Script_File;
use Horde_Script_File_External;
use Horde_Themes_Element;
use Horde\Routes\Utils;
use Horde\Log\Logger;
use Horde\Log\Handler\Syslog as SyslogHandler;
use Horde\Log\LogLevels;
use Psr\SimpleCache\CacheInterface;
use Throwable;

/**
 * Home controller - PSR-15 RequestHandler
 *
 * CRITICAL: Implements RequestHandlerInterface so dispatch.php can detect
 * this as a modern PSR-15 controller vs legacy Horde_Controller.
 */
class Home implements RequestHandlerInterface
{
    /**
     * Feed cache keys. Namespaced with 'hordeweb.' because the injected
     * PSR-16 cache is a *site-shared* keyspace (Redis on typical Horde
     * installs); the app has to prefix its own keys. The 'v2' suffix
     * lets us invalidate wholesale when the on-wire serialized layout
     * of Horde_Feed_* changes.
     *
     * The cron script bin/hordeweb-fetch-feed writes to the same keys
     * at the same TTL; the diagnostics controller reads them.
     */
    private const CACHE_KEY_PLANET    = 'hordeweb.feed.planet.v2';
    private const CACHE_KEY_HORDEFEED = 'hordeweb.feed.horde.v2';

    /** TTL (seconds) for a successfully fetched feed. */
    private const SUCCESS_TTL = 600;

    /**
     * TTL (seconds) for the negative-result sentinel keyed at
     * '<feedKey>.failed'. Short enough that a temporarily-broken remote
     * comes back quickly once it recovers; long enough that a persistent
     * outage doesn't retry-storm on every request.
     */
    private const NEGATIVE_TTL = 60;

    private Injector $injector;
    private ResponseFactoryInterface $responseFactory;
    private StreamFactoryInterface $streamFactory;
    private LoggerInterface $logger;

    public function __construct(
        Injector $injector,
        ResponseFactoryInterface $responseFactory,
        StreamFactoryInterface $streamFactory
    ) {
        $this->injector = $injector;
        $this->responseFactory = $responseFactory;
        $this->streamFactory = $streamFactory;

        // Get PSR-3 logger from injector, with fallback to syslog
        try {
            $this->logger = $injector->getInstance(Logger::class);
        } catch (Throwable $e) {
            // Fallback: create basic syslog logger
            $handler = new SyslogHandler('hordeweb', LOG_USER);
            $this->logger = new Logger([$handler], LogLevels::initWithCanonicalLevels());
        }
    }

    /**
     * Handle the request (PSR-15 RequestHandlerInterface)
     *
     * @param ServerRequestInterface $request PSR-7 request with route attribute
     * @return ResponseInterface PSR-7 response
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        // Get route match from request attribute (set by dispatch.php)
        $route = $request->getAttribute('route');
        $action = $route['action'] ?? 'index';

        // Route to action methods using modern match expression
        return match ($action) {
            'index' => $this->indexAction(),
            'contact' => $this->contactAction(),
            'thanks' => $this->thanksAction(),
            'logos' => $this->logosAction(),
            '410' => $this->pageGoneAction(),
            default => $this->notFoundAction(),
        };
    }

    /**
     * Get URL writer instance (for view compatibility)
     *
     * Views expect controller to have this method for URL generation.
     * Returns modern Horde\Routes\Utils instance which provides same urlFor() API.
     *
     * @return Utils
     */
    public function getUrlWriter(): Utils
    {
        return $this->injector->getInstance(Utils::class);
    }

    /**
     * Index action - home page with feeds
     */
    private function indexAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'The Horde Project';
        $view->maxHordeItems = 5;
        $view->maxPlanetItems = 10;

        // Add template path for Home views
        $view->addTemplatePath(
            array($GLOBALS['fs_base'] . '/app/views/Home')
        );

        $cache = $this->injector->getInstance(CacheInterface::class);

        // Create HTTP client with custom timeout. Used for the fallback
        // fetch when the cache is cold; the cron-run bin/hordeweb-fetch-feed
        // is meant to keep it warm.
        $feedTimeout = $GLOBALS['feed_timeout'] ?? 5;
        $httpClient = new Horde_Http_Client(['request.timeout' => $feedTimeout]);

        // Planet Horde: the "Ralf writes about Horde" tag feed.
        $view->planet = $this->_loadFeed(
            $cache,
            self::CACHE_KEY_PLANET,
            $GLOBALS['planet_feed_url'] ?? 'https://www.ralf-lang.de/tag/horde/feed/',
            $httpClient,
            'planet',
        );

        // The main horde.org news feed (no tag filter).
        $view->hordefeed = $this->_loadFeed(
            $cache,
            self::CACHE_KEY_HORDEFEED,
            $GLOBALS['feed_url'],
            $httpClient,
            'horde news',
        );

        return $this->renderTemplate($view, 'index', 'home');
    }

    /**
     * Read one feed from the PSR-16 cache, falling back to a synchronous
     * HTTP fetch on cold cache.
     *
     * Two behaviours worth calling out:
     *  - **Negative-result guarding.** When {@see Horde_Feed::readUri()}
     *    throws we stamp a short-lived sentinel under a paired '.failed'
     *    key. While that sentinel is present we skip the fetch entirely
     *    and return null — so a broken remote feed costs one 5 s timeout
     *    per {@see self::NEGATIVE_TTL} window instead of one per request.
     *  - **Successful hits carry a full TTL.** {@see self::SUCCESS_TTL}
     *    (10 minutes) at PSR-16 set() time; the cron script
     *    (bin/hordeweb-fetch-feed) writes to the same key at the same
     *    TTL so cron-warmed entries are indistinguishable from
     *    request-warmed ones.
     */
    private function _loadFeed(
        CacheInterface $cache,
        string $key,
        string $url,
        Horde_Http_Client $httpClient,
        string $label,
    ) {
        $cached = $cache->get($key);
        if ($cached !== null) {
            $unserialized = @unserialize($cached);
            if ($unserialized && is_iterable($unserialized)) {
                return $unserialized;
            }
        }

        // Recent failure: don't retry-storm the broken endpoint.
        if ($cache->get($key . '.failed') !== null) {
            return null;
        }

        try {
            // Suppress deprecation warnings from Horde_Xml_Element
            $feed = @Horde_Feed::readUri($url, $httpClient);
        } catch (Throwable $e) {
            $this->logger->error(
                'Home controller: Failed to fetch ' . $label . ' feed: {exception}: {message}',
                [
                    'exception' => get_class($e),
                    'message' => $e->getMessage(),
                ]
            );
            $cache->set($key . '.failed', 1, self::NEGATIVE_TTL);
            return null;
        }

        if ($feed === null || $feed === false) {
            $cache->set($key . '.failed', 1, self::NEGATIVE_TTL);
            return null;
        }

        $cache->set($key, serialize($feed), self::SUCCESS_TTL);
        return $feed;
    }

    /**
     * Contact action - contact page
     */
    private function contactAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'Contact Us - The Horde Project';

        // Add template path for Home views
        $view->addTemplatePath(
            array($GLOBALS['fs_base'] . '/app/views/Home')
        );

        return $this->renderTemplate($view, 'contactus', 'main');
    }

    /**
     * Thanks action - thanks page
     */
    private function thanksAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'Thanks - The Horde Project';

        // Add template path for Home views
        $view->addTemplatePath(
            array($GLOBALS['fs_base'] . '/app/views/Home')
        );

        return $this->renderTemplate($view, 'thanks', 'main');
    }

    /**
     * Logos action - logos page
     */
    private function logosAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'Logos - The Horde Project';

        // Add template path for Home views
        $view->addTemplatePath(
            array($GLOBALS['fs_base'] . '/app/views/Home')
        );

        return $this->renderTemplate($view, 'logos', 'main');
    }

    /**
     * 410 Gone action
     */
    private function pageGoneAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = '410 - Page Gone';

        // Add template path for Home views
        $view->addTemplatePath(
            array($GLOBALS['fs_base'] . '/app/views/Home')
        );

        return $this->renderTemplate($view, '410', 'main', 410);
    }

    /**
     * 404 Not Found action
     */
    private function notFoundAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'The Horde Project';

        // Add template path for Home views
        $view->addTemplatePath(
            array($GLOBALS['fs_base'] . '/app/views/Home')
        );

        return $this->renderTemplate($view, '404', 'main', 404);
    }

    /**
     * Setup view with common properties
     *
     * Replicates the setup from HordeWeb_Controller_Base::_setup()
     *
     * @return \Horde_View_Base Configured view object
     */
    private function setupView(): \Horde_View_Base
    {
        global $host_base, $site_name;

        // Setup page output (scripts, CSS)
        $pageOutput = $this->injector->getInstance('Horde_PageOutput');
        $pageOutput->addScriptFile(
            new HordeWeb_Script_File('jquery-1.4.4.min.js')
        );

        // Add main CSS
        $css = new Horde_Themes_Element(
            'horde.css',
            array('data' => array(
               'fs' => $GLOBALS['fs_base'] . '/css/horde.css',
               'uri' => $host_base . '/css/horde.css'
            ))
        );
        $pageOutput->addStylesheet($css->fs, $css->uri);

        // Get view from injector
        $view = $this->injector->getInstance('HordeWeb_View');

        // Setup URL generation using modern Routes\Utils
        $urlWriter = $this->injector->getInstance(Utils::class);
        $view->urlWriter = $urlWriter;
        $view->homeurl = $urlWriter->urlFor('home');
        $view->feedurl = '';
        $view->quote = HordeWeb_Utils::getQuote();

        // For helpers compatibility
        $view->controller = $this;

        // TODO: Refactor away globals
        $view->host_base = $host_base;

        return $view;
    }

    /**
     * Render template with layout
     *
     * @param \Horde_View_Base $view Configured view
     * @param string $template Template name
     * @param string $layoutName Layout name ('main' or 'home')
     * @param int $status HTTP status code
     * @return ResponseInterface PSR-7 response
     */
    private function renderTemplate(
        \Horde_View_Base $view,
        string $template,
        string $layoutName = 'main',
        int $status = 200
    ): ResponseInterface {
        // Get layout from injector
        $layout = $this->injector->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName($layoutName);

        // Render template
        $html = $layout->render($template);

        // Create PSR-7 response
        $response = $this->responseFactory->createResponse($status);
        $body = $this->streamFactory->createStream($html);
        return $response->withBody($body);
    }
}
