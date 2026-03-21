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
 * @author   Ralf Lang <lang@b1-systems.de>
 */

declare(strict_types=1);

namespace Horde\Hordeweb\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Horde_Injector;
use Horde_Cache;
use Horde_Feed;
use HordeWeb_Utils;
use Horde\Routes\Utils;

/**
 * Home controller - PSR-15 RequestHandler
 *
 * CRITICAL: Implements RequestHandlerInterface so dispatch.php can detect
 * this as a modern PSR-15 controller vs legacy Horde_Controller.
 */
class Home implements RequestHandlerInterface
{
    private Horde_Injector $injector;
    private ResponseFactoryInterface $responseFactory;
    private StreamFactoryInterface $streamFactory;

    public function __construct(
        Horde_Injector $injector,
        ResponseFactoryInterface $responseFactory,
        StreamFactoryInterface $streamFactory
    ) {
        $this->injector = $injector;
        $this->responseFactory = $responseFactory;
        $this->streamFactory = $streamFactory;
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

        $cache = $this->injector->getInstance(Horde_Cache::class);

        // Cache version to invalidate old serialized data
        $cacheVersion = 'v2';

        // Get the planet feed
        $planetKey = 'planet_' . $cacheVersion;
        if ($planet = $cache->get($planetKey, 600)) {
            $unserialized = @unserialize($planet);
            // Validate it's a traversable feed object
            if ($unserialized && is_iterable($unserialized)) {
                $view->planet = $unserialized;
            } else {
                // Corrupted cache, refetch
                $view->planet = null;
            }
        }

        if (!isset($view->planet)) {
            try {
                $view->planet = Horde_Feed::readUri('https://www.ralf-lang.de/tag/horde/feed');
            } catch (\Exception $e) {
                $view->planet = null;
            }
            $cache->set($planetKey, serialize($view->planet));
        }

        // Get the complete Horde feed (no tags)
        $hordefeedKey = 'hordefeed_' . $cacheVersion;
        if ($hordefeed = $cache->get($hordefeedKey, 600)) {
            $unserialized = @unserialize($hordefeed);
            // Validate it's a traversable feed object
            if ($unserialized && is_iterable($unserialized)) {
                $view->hordefeed = $unserialized;
            } else {
                // Corrupted cache, refetch
                $view->hordefeed = null;
            }
        }

        if (!isset($view->hordefeed)) {
            try {
                $view->hordefeed = Horde_Feed::readUri($GLOBALS['feed_url']);
            } catch (\Exception $e) {
                $view->hordefeed = null;
            }
            $cache->set($hordefeedKey, serialize($view->hordefeed));
        }

        return $this->renderTemplate($view, 'index', 'home');
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
            new \HordeWeb_Script_File('jquery-1.4.4.min.js')
        );
        $pageOutput->addScriptFile(new \Horde_Script_File_External(
            'https://apis.google.com/js/plusone.js'
        ));

        // Add main CSS
        $css = new \Horde_Themes_Element(
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
