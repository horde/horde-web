<?php
/**
 * Modern PSR-15 Download Controller
 *
 * Handles requests to the download page using PSR-7/15 standards.
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
use Horde_Injector;
use Horde\Routes\Utils;
use HordeWeb_Utils;

/**
 * Download controller - PSR-15 RequestHandler
 */
class Download implements RequestHandlerInterface
{
    private Horde_Injector $injector;
    private ResponseFactoryInterface $responseFactory;
    private StreamFactoryInterface $streamFactory;
    private array $route;
    private string $era = 'h6';

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
            'app' => $this->h6Action(),
            'h5' => $this->h5Action(),
            'h6' => $this->h6Action(),
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

    private function h5Action(): ResponseInterface
    {
        $this->era = 'h5';
        $app = $this->route['app'] ?? '';
        if (empty($app)) {
            exit;
        }

        $view = $this->setupView();
        $view->page_title = 'Downloads - The Horde Project';
        $view->appListController = array('controller' => 'download', 'action' => 'app');
        $view->appname = $app;

        $horde_apps_stable = $view->stable;
        $horde_apps_h4     = $view->h4Stable;
        $horde_apps_dev    = HordeWeb_Utils::getDevApps();

        $app_info = $h3app = $h4date = $stableapp = $stabledate = $devapp = $app_list = array();
        if ($app != 'groupware' && $app != 'webmail') {
            $app_list[] = 'horde';
        }
        if (in_array($app, array('dimp', 'mimp'))) {
            $app_list[] = 'imp';
        }
        $app_list[] = $app;
        $app_list = array_unique($app_list);

        foreach ($app_list as $val) {
            $stable = HordeWeb_Utils::getStableApps($val);
            $h4 = HordeWeb_Utils::getH4Apps($val);
            $stabledate[$val] = $stable ? strtotime($stable['date']) : 0;
            $h4date[$val] = $h4 ? strtotime($h4['date']) : 0;
        }

        $stable = HordeWeb_Utils::getStableApps($app);
        if ($stable) {
            foreach ($app_list as $val) {
                $stableapp[] = HordeWeb_Utils::app_download_link($val, HordeWeb_Utils::getStableApps($val), false, $this);
            }
            $app_info = $stable;
        } else {
            $stableapp[] = 'No current stable release';
        }

        $h3 = HordeWeb_Utils::getH3Apps($app);
        if ($h3) {
            foreach ($app_list as $val) {
                $h3app[] = HordeWeb_Utils::app_download_link($val, HordeWeb_Utils::getH3Apps($val), false, $this);
            }
            $h3app[] = '<a href="' . htmlspecialchars(HordeWeb_Utils::app_patches_url($val, $h3)) . '">Patches for Deprecated Horde 3 Stable Release</a>';
        }

        $dev = HordeWeb_Utils::getDevApps($app);
        if ($dev &&
            $stabledate[$app] < strtotime($dev['date']) &&
            $h4date[$app] < strtotime($dev['date'])) {
            foreach ($app_list as $val) {
                $info = HordeWeb_Utils::getDevApps($val);
                if (!$info) {
                    $devapp[] = HordeWeb_Utils::app_download_link($val, HordeWeb_Utils::getStableApps($val));
                } elseif ($h4date[$val] > strtotime($dev['date'])) {
                    $devapp[] = HordeWeb_Utils::app_download_link($val, HordeWeb_Utils::getH4Apps($val));
                } elseif ($stabledate[$val] > strtotime($dev['date'])) {
                    $devapp[] = HordeWeb_Utils::app_download_link($val, HordeWeb_Utils::getStableApps($val));
                } else {
                    $devapp[] = HordeWeb_Utils::app_download_link($val, HordeWeb_Utils::getDevApps($val));
                }
            }
            if (empty($app_info)) {
                $app_info = $dev;
            }
        }

        if (!$stable && !$h3 && !$dev) {
            return $this->notFoundAction();
        }

        if (empty($app_info)) {
            $app_info['name'] = ucfirst($app);
        }

        $view->h3app = $h3app;
        $view->stableapp = $stableapp;
        $view->stabledate = $stabledate;
        $view->devapp = $devapp;
        $view->app_info = $app_info;

        return $this->renderTemplate($view, 'app_h5', 'main');
    }

    private function h6Action(): ResponseInterface
    {
        $this->era = 'h6';
        $app = $this->route['app'] ?? '';
        if (empty($app)) {
            exit;
        }

        $view = $this->setupView();
        $view->page_title = 'Downloads - The Horde Project';
        $view->appname = $app;

        $app_info = [];
        $app_info['name'] = ucfirst($app);

        $view->app_info = $app_info;

        return $this->renderTemplate($view, 'app_h6', 'main');
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

        // Add template paths and properties for Download views
        $app = $this->route['app'] ?? '';
        $view->hasAdditional = file_exists($GLOBALS['fs_base'] . '/app/views/Download/apps/' . $app . '/additional.html.php');
        $view->addTemplatePath(
            array(
                $GLOBALS['fs_base'] . '/app/views/Download',
                $GLOBALS['fs_base'] . '/app/views/Download/apps/' . $app
            )
        );
        $view->stable = HordeWeb_Utils::getH3Apps();
        $view->h4Stable = HordeWeb_Utils::getH4Apps();

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
