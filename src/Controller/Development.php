<?php
/**
 * Modern PSR-15 Development Controller
 *
 * Handles requests to the development pages using PSR-7/15 standards.
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
use Horde\Routes\Utils;
use HordeWeb_Utils;

/**
 * Development controller - PSR-15 RequestHandler
 */
class Development implements RequestHandlerInterface
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
            'git' => $this->gitAction(),
            'cvs' => $this->cvsAction(),
            'contribute' => $this->contributeAction(),
            'documentation' => $this->documentationAction(),
            'licenses' => $this->licensesAction(),
            'modules' => $this->modulesAction(),
            'cvsmodules' => $this->cvsmodulesAction(),
            'versions' => $this->versionsAction(),
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

    /**
     * Helper method for views - git module and version
     */
    public function git_and_ver(string $module): string
    {
        $stable = HordeWeb_Utils::getStableApps($module);
        $dev = HordeWeb_Utils::getDevApps($module);
        return '<td><a href="http://git.horde.org/horde-git/-/browse/' . htmlspecialchars($module) . '/">' . htmlspecialchars($module) . '</a>'
            . '</td><td>' . ($stable ? htmlspecialchars($stable['version']) : ($dev ? htmlspecialchars($dev['version']) : '&nbsp;'))
            . '</td>';
    }

    /**
     * Helper method for views - cvs module and version
     */
    public function cvs_and_ver(string $module): string
    {
        $stable = HordeWeb_Utils::getH3Apps($module);
        $dev = HordeWeb_Utils::getDevApps($module);
        return '<td style="white-space: nowrap"><a href="http://git.horde.org/horde/-/browse/' . htmlspecialchars($module) . '/">' . htmlspecialchars($module) . '</a>'
            . '</td><td>' . ($stable ? htmlspecialchars($stable['version']) : ($dev && substr($dev['version'], 0, 2) == 'H3' ? htmlspecialchars($dev['version']) : '&nbsp;'))
            . '</td>';
    }

    private function indexAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'Development - The Horde Project';
        return $this->renderTemplate($view, 'index', 'main');
    }

    private function gitAction(): ResponseInterface
    {
        $this->addSyntaxhighlighter();
        $view = $this->setupView();
        $view->page_title = 'Git - The Horde Project';
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('Git' => 'git'));
        return $this->renderTemplate($view, 'git', 'main');
    }

    private function cvsAction(): ResponseInterface
    {
        $this->addSyntaxhighlighter();
        $view = $this->setupView();
        $view->page_title = 'Cvs - The Horde Project';
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('CVS' => 'cvs'));
        return $this->renderTemplate($view, 'cvs', 'main');
    }

    private function contributeAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'Contribute - The Horde Project';
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('Contribute' => 'contribute'));
        return $this->renderTemplate($view, 'contribute', 'main');
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
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('Licenses' => 'licenses'));
        return $this->renderTemplate($view, 'licenses', 'main');
    }

    private function modulesAction(): ResponseInterface
    {
        $this->injector->getInstance('Horde_PageOutput')->addScriptFile('stripe.js');
        $view = $this->setupView();
        $view->page_title = 'Modules - The Horde Project';
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('Modules' => 'modules'));
        return $this->renderTemplate($view, 'modules', 'main');
    }

    private function cvsmodulesAction(): ResponseInterface
    {
        $this->injector->getInstance('Horde_PageOutput')->addScriptFile('stripe.js');
        $view = $this->setupView();
        $view->page_title = 'Cvsmodules - The Horde Project';
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('Modules' => 'modules'));
        return $this->renderTemplate($view, 'cvsmodules', 'main');
    }

    private function versionsAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'Versions - The Horde Project';
        $view->breadcrumb = HordeWeb_Utils::breadcrumbs($this, array('Versions' => 'versions'));
        return $this->renderTemplate($view, 'versions', 'main');
    }

    private function notFoundAction(): ResponseInterface
    {
        $view = $this->setupView();
        $view->page_title = 'The Horde Project';
        return $this->renderTemplate($view, '404', 'main', 404);
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

        // Add template path for Development views
        $view->addTemplatePath(
            array($GLOBALS['fs_base'] . '/app/views/Development')
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
