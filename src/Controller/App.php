<?php
/**
 * Modern PSR-15 App Controller
 *
 * Handles requests to the application pages using PSR-7/15 standards.
 *
 * Copyright 2011-2026 Horde LLC (http://www.horde.org)
 *
 * @license  http://opensource.org/licenses/bsd-license.php BSD
 * @author   Michael J Rubinsky <mrubinsk@horde.org>
 * @author   Ralf Lang <lang@b1-systems.de>
 */

declare(strict_types=1);

namespace HordeWeb\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Horde_Injector;
use Horde_Feed;
use Horde_Service_Gravatar;
use Horde\Routes\Utils;
use HordeWeb_Utils;

/**
 * App controller - PSR-15 RequestHandler
 */
class App implements RequestHandlerInterface
{
    private Horde_Injector $injector;
    private ResponseFactoryInterface $responseFactory;
    private StreamFactoryInterface $streamFactory;
    private array $route;

    public function __construct(
        Horde_Injector $injector,
        ResponseFactoryInterface $responseFactory,
        StreamFactoryInterface $streamFactory
    ) {
        $this->injector = $injector;
        $this->responseFactory = $responseFactory;
        $this->streamFactory = $streamFactory;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $this->route = $request->getAttribute('route');
        $action = $this->route['action'] ?? 'index';

        return match ($action) {
            'index' => $this->indexAction(),
            'app' => ($this->route['app'] ?? '') == 'h3' ? $this->indexAction() : $this->appAction(),
            'authors' => $this->authorsAction(),
            'docs' => $this->docsAction(),
            'screenshots' => $this->screenshotsAction('screenshots'),
            'screenshots_old' => $this->screenshotsAction('screenshots_old'),
            'roadmap' => $this->roadmapAction(),
            default => $this->notFoundAction(),
        };
    }

    public function getUrlWriter(): Utils
    {
        return $this->injector->getInstance(Utils::class);
    }

    public function getView(): \Horde_View_Base
    {
        return $this->injector->getInstance('HordeWeb_View');
    }

    private function indexAction(): ResponseInterface
    {
        $view = $this->setupView();
        $app = $this->route['app'] ?? '';
        $view->page_title = ($app == 'h3' ?
            'Horde 3' : 'Horde') . ' Applications - The Horde Project';
        $view->stable = $app == 'h3' ?
             HordeWeb_Utils::getH3Apps() : HordeWeb_Utils::getH4Apps();
        $view->appListController = array('controller' => 'app', 'action' => 'app');

        $template = $app == 'h3' ? 'horde3' : 'index';
        return $this->renderTemplate($view, $template, 'main');
    }

    private function appAction(): ResponseInterface
    {
        $view = $this->setupView();
        $app = $this->route['app'] ?? '';
        $view->page_title = $view->appnameHuman . ' - The Horde Project';

        // Do we know about this app?
        if (file_exists($GLOBALS['fs_base'] . '/app/views/App/apps/' . urlencode($app)) === false) {
            return $this->notFoundAction();
        }

        // Build the bug/news widget
        $cache = HordeWeb_Utils::getCache();
        $slugs = array($app);
        $view->latestNews = array();
        foreach ($slugs as $slug) {
            $base_feed_url = \Horde::url($GLOBALS['feed_url'])->add('tag_id', $slug)->setRaw(true);
            if ($latestnews = $cache->get('hordefeed' . $slug, 600)) {
                $view->latestNews = unserialize($latestnews);
            } else {
                try {
                    $i = 1;
                    foreach (Horde_Feed::readUri($base_feed_url) as $entry) {
                        $view->latestNews[] = $entry;
                        if (++$i > 5) {
                            break;
                        }
                    }
                } catch (\Exception $e) {
                }
                $cache->set('hordefeed' . $slug, serialize($view->latestNews));
            }
        }

        return $this->renderTemplate($view, 'app', 'main');
    }

    private function authorsAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->addTemplatePath(array($GLOBALS['fs_base'] . '/app/views/shared/authors'));
        $view->page_title = 'Authors - ' . $view->appnameHuman . ' - The Horde Project';

        // Gracefully handle missing Gravatar service
        if (class_exists('Horde_Service_Gravatar')) {
            $view->gravatar = new Horde_Service_Gravatar();
        } else {
            $view->gravatar = null;
        }

        return $this->renderTemplate($view, 'authors', 'main');
    }

    private function roadmapAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'Roadmap - ' . $view->appnameHuman . ' - The Horde Project';
        return $this->renderTemplate($view, 'roadmap', 'main');
    }

    private function docsAction(): ResponseInterface
    {
        $app = $this->route['app'] ?? '';
        $file = $GLOBALS['fs_base'] . '/app/views/App/apps/'
            . $app . '/docs/'
            . ($this->route['file'] ?? 'docs')
            . '.html';
        if (!file_exists($file)) {
            return $this->notFoundAction();
        }

        $view = $this->setupView();
        $view->page_title = 'Documentation - ' . $view->appnameHuman . ' - The Horde Project';
        \Horde::startBuffer();
        include $file;
        $view->content = \Horde::endBuffer();
        return $this->renderTemplate($view, 'docs', 'main');
    }

    private function screenshotsAction(string $type): ResponseInterface
    {
        $pageOutput = $this->injector->getInstance('Horde_PageOutput');
        $script = new \Horde_Script_File_External($GLOBALS['host_base'] . '/js/jquery.lightbox-0.5.min.js');
        $pageOutput->addScriptFile($script);

        $css = new \Horde_Themes_Element('jquery.lightbox-0.5.css', array('data' => array('fs' => $GLOBALS['fs_base'] . '/css/jquery.lightbox-0.5.css', 'uri' => $GLOBALS['host_base'] . '/css/jquery.lightbox-0.5.css')));
        $pageOutput->addStylesheet($css->fs, $css->uri);

        $js = '$(function() { $("a.lightbox").lightBox(
            {"imageBtnPrev": "' . $GLOBALS['host_base'] . '/images/lightbox-btn-prev.gif",
             "imageBtnNext": "' . $GLOBALS['host_base'] . '/images/lightbox-btn-next.gif",
             "imageLoading": "' . $GLOBALS['host_base'] . '/images/lightbox-ico-loading.gif",
             "imageBtnClose": "' . $GLOBALS['host_base'] . '/images/lightbox-btn-close.gif",
             "imageBlank": "' . $GLOBALS['host_base'] . '/images/lightbox-blank.gif"});})';
        $pageOutput->addInlineScript($js);

        $view = $this->setupView();
        $view->page_title = 'Screenshots - ' . $view->appnameHuman . ' - The Horde Project';
        return $this->renderTemplate($view, $type, 'main');
    }

    private function notFoundAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'The Horde Project';
        return $this->renderTemplate($view, '404', 'main', 404);
    }

    private function setupView(): \Horde_View_Base
    {
        global $host_base;

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

        // Setup URL writer
        $view->controller = $this;
        $view->urlWriter = $this->injector->getInstance(Utils::class);
        $view->homeurl = $view->urlWriter->urlFor('home');
        $view->feedurl = '';
        $view->quote = HordeWeb_Utils::getQuote();

        // Add template paths and app-specific properties
        $app = $this->route['app'] ?? '';
        $view->addTemplatePath(
            array(
                $GLOBALS['fs_base'] . '/app/views/App',
                $GLOBALS['fs_base'] . '/app/views/App/apps/' . $app
            )
        );
        $view->appname = $app;
        $view->hasAuthors = file_exists($GLOBALS['fs_base'] . '/app/views/App/apps/' . $app . '/appauthors.html.php');
        $view->hasDocs = file_exists($GLOBALS['fs_base'] . '/app/views/App/apps/' . $app . '/docs');
        $view->hasScreenshots = file_exists($GLOBALS['fs_base'] . '/app/views/App/apps/' . $app . '/appscreenshots.html.php');
        $view->hasRoadmap = file_exists($GLOBALS['fs_base'] . '/app/views/App/apps/' . $app . '/approadmap.html.php');

        // @TODO: Look this up in some kind of config/lookup array.
        $view->appnameHuman = in_array($app, array('imp', 'mimp', 'dimp'))
            ? \Horde_String::upper($app)
            : \Horde_String::ucfirst($app);

        $view->host_base = $host_base;

        return $view;
    }

    private function renderTemplate(
        \Horde_View_Base $view,
        string $template,
        string $layoutName = 'main',
        int $status = 200
    ): ResponseInterface {
        $layout = $this->injector->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName($layoutName);
        $html = $layout->render($template);

        $response = $this->responseFactory->createResponse($status);
        $body = $this->streamFactory->createStream($html);
        return $response->withBody($body);
    }
}
