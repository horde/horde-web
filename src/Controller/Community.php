<?php
/**
 * Modern PSR-15 Community Controller
 *
 * Handles requests to the community pages using PSR-7/15 standards.
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
use Horde\Injector\Injector;
use Horde_Service_Gravatar;
use Horde\Routes\Utils;
use HordeWeb_Utils;

/**
 * Community controller - PSR-15 RequestHandler
 */
class Community implements RequestHandlerInterface
{
    private Injector $injector;
    private ResponseFactoryInterface $responseFactory;
    private StreamFactoryInterface $streamFactory;

    public function __construct(
        Injector $injector,
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
            'team' => $this->teamAction(),
            'mail' => $this->mailAction(),
            'localization' => $this->localizationAction(),
            'support' => $this->supportAction(),
            'documentation' => $this->documentationAction(),
            'licenses' => $this->licensesAction(),
            'papers' => $this->papersAction(),
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
        $view->page_title = 'Community - The Horde Project';
        return $this->renderTemplate($view, 'index', 'main');
    }

    private function teamAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->addTemplatePath($GLOBALS['fs_base'] . '/app/views/shared/authors');
        $view->page_title = 'Team - The Horde Project';
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('Team' => 'team'));

        // Gracefully handle missing Gravatar service
        if (class_exists('Horde_Service_Gravatar')) {
            $view->gravatar = new Horde_Service_Gravatar();
        } else {
            $view->gravatar = null;
        }

        return $this->renderTemplate($view, 'team', 'main');
    }

    private function mailAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'Mailing Lists - The Horde Project';
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('Mailing Lists' => 'mail'));
        $view->lists = HordeWeb_Utils::getLists();
        return $this->renderTemplate($view, 'mail', 'main');
    }

    private function localizationAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'Localization - The Horde Project';
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('Localization' => 'localization'));
        return $this->renderTemplate($view, 'localization', 'main');
    }

    private function supportAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'Support - The Horde Project';
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('Support' => 'support'));
        return $this->renderTemplate($view, 'support', 'main');
    }

    private function documentationAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'Documentation - The Horde Project';
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('Documentation' => 'documentation'));
        return $this->renderTemplate($view, 'documentation', 'main');
    }

    private function licensesAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'Licenses - The Horde Project';
        return $this->renderTemplate($view, 'licenses', 'main');
    }

    private function papersAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'Papers - The Horde Project';
        return $this->renderTemplate($view, 'papers', 'main');
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

        // Add template path for Community views
        $view->addTemplatePath(
            array($GLOBALS['fs_base'] . '/app/views/Community')
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
