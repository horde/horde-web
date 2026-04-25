<?php
/**
 * Modern PSR-15 Library Controller
 *
 * Handles requests to the library pages using PSR-7/15 standards.
 *
 * Copyright 2011-2026 Horde LLC (http://www.horde.org)
 *
 * @license  http://opensource.org/licenses/bsd-license.php BSD
 * @author   Michael J Rubinsky <mrubinsk@horde.org>
 * @author   Gunnar Wrobel <wrobel@horde.org>
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
 * Library controller - PSR-15 RequestHandler
 */
class Library implements RequestHandlerInterface
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
            'index' => $this->h6Action(),
            'h5' => $this->h5Action(),
            'h6' => $this->h6Action(),
            'library' => $this->libraryAction(),
            'download' => $this->downloadAction(),
            'docs' => $this->docsAction(),
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
        $this->addSyntaxhighlighter();
        $view = $this->setupView();
        $view->page_title = 'Horde 5 PHP Libraries';
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this);
        $view->libraryListController = array('controller' => 'library', 'action' => '');
        return $this->renderTemplate($view, 'libraries_h5', 'main');
    }

    private function h6Action(): ResponseInterface
    {
        $this->era = 'h6';
        $this->addSyntaxhighlighter();
        $view = $this->setupView();
        $view->page_title = 'Horde 6 PHP Libraries';
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this);
        $view->libraryListController = array('controller' => 'library', 'action' => '');
        return $this->renderTemplate($view, 'libraries_h6', 'main');
    }

    private function libraryAction(): ResponseInterface
    {
        $this->detectEra();
        $view = $this->setupView();

        if (!$this->isKnownLibrary($view)) {
            return $this->notFoundAction();
        }

        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this);
        return $this->renderTemplate($view, 'library', 'main');
    }

    private function downloadAction(): ResponseInterface
    {
        $this->detectEra();
        $this->addSyntaxhighlighter();
        $view = $this->setupView();

        if ($this->isKnownLibrary($view)) {
            $template = $this->era === 'h6' ? 'download_h6' : 'download';
            $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this);
        } else {
            $template = '404';
        }

        return $this->renderTemplate($view, $template, 'main');
    }

    private function docsAction(): ResponseInterface
    {
        $this->detectEra();
        $view = $this->setupView();

        if ($this->isKnownLibrary($view)) {
            $template = 'docs';
            $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this);
            \Horde::startBuffer();
            include $GLOBALS['fs_base'] . '/app/views/Library/libraries/' . $view->libraryName . '/docs/' . ($this->route['file'] ?? 'docs') . '.html';
            $view->content = \Horde::endBuffer();
        } else {
            $template = '404';
        }

        return $this->renderTemplate($view, $template, 'main');
    }

    private function notFoundAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'The Horde Project';
        return $this->renderTemplate($view, '404', 'main', 404);
    }

    private function detectEra(): void
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '';
        if (str_contains($uri, '/libraries/h5')) {
            $this->era = 'h5';
        } else {
            $this->era = 'h6';
        }
    }

    private function isKnownLibrary(\Horde_View_Base $view): bool
    {
        if (!in_array($view->libraryName, $view->libraries)) {
            return false;
        }
        $view->page_title = $view->shortLibraryName . ' library - The Horde Project';
        $view->libraryDetails = HordeWeb_Utils::getLibraries()->fetchLibrary($view->libraryName, $this->era);
        return true;
    }

    private function addSyntaxhighlighter(): void
    {
        $registry = $this->injector->getInstance('Horde_Registry');

        $pageOutput = $this->injector->getInstance('Horde_PageOutput');

        $pageOutput->addScriptFile(
            'syntaxhighlighter/scripts/shCore.js', 'horde'
        );
        $pageOutput->addScriptFile(
            'syntaxhighlighter/scripts/shAutoloader.js', 'horde'
        );
        $path = $registry->get('jsuri', 'horde')
            . '/syntaxhighlighter/scripts/';
        $brushes = <<<EOT
            SyntaxHighlighter.autoloader(
              'applescript            {$path}shBrushAppleScript.js',
              'actionscript3 as3      {$path}shBrushAS3.js',
              'bash shell             {$path}shBrushBash.js',
              'coldfusion cf          {$path}shBrushColdFusion.js',
              'cpp c                  {$path}shBrushCpp.js',
              'c# c-sharp csharp      {$path}shBrushCSharp.js',
              'css                    {$path}shBrushCss.js',
              'delphi pascal          {$path}shBrushDelphi.js',
              'diff patch pas         {$path}shBrushDiff.js',
              'erl erlang             {$path}shBrushErlang.js',
              'groovy                 {$path}shBrushGroovy.js',
              'java                   {$path}shBrushJava.js',
              'jfx javafx             {$path}shBrushJavaFX.js',
              'js jscript javascript  {$path}shBrushJScript.js',
              'perl pl                {$path}shBrushPerl.js',
              'php                    {$path}shBrushPhp.js',
              'text plain             {$path}shBrushPlain.js',
              'py python              {$path}shBrushPython.js',
              'ruby rails ror rb      {$path}shBrushRuby.js',
              'scala                  {$path}shBrushScala.js',
              'sql                    {$path}shBrushSql.js',
              'vb vbnet               {$path}shBrushVb.js',
              'xml xhtml xslt html    {$path}shBrushXml.js'
            );
            SyntaxHighlighter.defaults['toolbar'] = false;
            SyntaxHighlighter.all();
EOT;
        $pageOutput->addInlineScript($brushes, true);
        $pageOutput->addStylesheet(
            $registry->get('jsuri', 'horde') . '/syntaxhighlighter/styles/shCoreEclipse.css',
            $registry->get('jsuri', 'horde') . '/syntaxhighlighter/styles/shCoreEclipse.css'
        );
        $pageOutput->addStylesheet(
            $registry->get('jsuri', 'horde') . '/syntaxhighlighter/styles/shThemeEclipse.css',
            $registry->get('jsuri', 'horde') . '/syntaxhighlighter/styles/shThemeEclipse.css'
        );
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

        // Add template paths and properties for Library views
        $library = $this->route['library'] ?? '';
        $view->addTemplatePath(
            array(
                $GLOBALS['fs_base'] . '/app/views/Library',
                $GLOBALS['fs_base'] . '/app/views/Library/libraries/' . $library
            )
        );
        $view->libraryName = $library;
        $view->shortLibraryName = str_replace('Horde_', '', $view->libraryName);
        $view->libraries = HordeWeb_Utils::getLibraries()->listLibraries($this->era);
        $view->era = $this->era;

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
