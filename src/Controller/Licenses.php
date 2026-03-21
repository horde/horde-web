<?php
/**
 * Modern PSR-15 Licenses Controller
 *
 * Handles requests to the licenses pages using PSR-7/15 standards.
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
use Horde\Routes\Utils;
use HordeWeb_Utils;

/**
 * Licenses controller - PSR-15 RequestHandler
 */
class Licenses implements RequestHandlerInterface
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

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $route = $request->getAttribute('route');
        $action = $route['action'] ?? 'index';

        return match ($action) {
            'index' => $this->indexAction(),
            'gpl' => $this->gplAction(),
            'lgpl' => $this->lgplAction(),
            'lgpl21' => $this->lgpl21Action(),
            'bsd' => $this->bsdAction(),
            'apache' => $this->apacheAction(),
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
        $view->page_title = 'Licenses - The Horde Project';
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('Licenses' => 'licenses'));
        return $this->renderTemplate($view, 'index', 'main');
    }

    private function gplAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('GPL' => 'gpl'));
        $base = $GLOBALS['fs_base'] . '/app/views/Licenses/';
        $view->license = file($base . 'COPYING');
        return $this->renderTemplate($view, 'gpl', 'main');
    }

    private function lgplAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('LGPL' => 'lgpl'));
        $base = $GLOBALS['fs_base'] . '/app/views/Licenses/';
        $view->license = file($base . 'LGPL');
        return $this->renderTemplate($view, 'lgpl', 'main');
    }

    private function lgpl21Action(): ResponseInterface
    {
        $view = $this->setupView();
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('LGPL' => 'lgpl'));
        $base = $GLOBALS['fs_base'] . '/app/views/Licenses/';
        $view->license = file($base . 'LGPL-2.1');
        return $this->renderTemplate($view, 'lgpl21', 'main');
    }

    private function bsdAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('BSD' => 'bsd'));
        $base = $GLOBALS['fs_base'] . '/app/views/Licenses/';
        $view->license = file($base . 'COPYRIGHT');
        return $this->renderTemplate($view, 'bsd', 'main');
    }

    private function apacheAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('Apache' => 'apache'));
        $base = $GLOBALS['fs_base'] . '/app/views/Licenses/';
        $view->license = file($base . 'LICENSE');
        return $this->renderTemplate($view, 'apache', 'main');
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

        // Add template path for Licenses views
        $view->addTemplatePath(
            array($GLOBALS['fs_base'] . '/app/views/Licenses')
        );

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
