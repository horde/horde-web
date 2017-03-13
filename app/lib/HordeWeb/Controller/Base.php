<?php
/**
 * Base class for HordeWeb controllers.
 *
 * Copyright 2011 Horde LLC (http://www.horde.org)
 *
 * @author mrubinsk
 */
abstract class HordeWeb_Controller_Base extends Horde_Controller_Base
{
    /**
     *
     * @var Horde_Routes_Matcher the match dictionary handler
     */
    protected $_matcher;

    /**
     *
     * @var Horde_Support_Array  The match dictionary.
     */
    protected $_matchDict;

    /**
     *
     * @var Horde_Controller_UrlWriter
     */
    public $urlWriter;

    /**
     * Constructor.
     *
     * @param Horde_Routes_Matcher $matcher  The match dictionary.
     */
    public function __construct(Horde_Routes_Matcher $matcher)
    {
        $this->_matcher = $matcher;
    }

    /**
     *
     *
     * @param Horde_Controller_Request $request
     * @param Horde_Controller_Response $response
     */
    public function processRequest(Horde_Controller_Request $request, Horde_Controller_Response $response)
    {
        $this->_matchDict = $this->_matcher->getMatchDict();
        $this->_setup();
        $this->_processRequest($response);
    }

    /**
     * Setup needed properties
     *
     */
    protected function _setup()
    {
        global $site_name;

        $script = new Horde_Script_File_External($GLOBALS['host_base'] . '/js/jquery-1.4.4.min.js');
        $GLOBALS['injector']->getInstance('Horde_PageOutput')->addScriptFile($script);

        // Set the view, with correct template path set by the binder
        $view = $GLOBALS['injector']->getInstance('HordeWeb_View');

        $this->urlWriter = $view->urlWriter = $this->getUrlWriter();
        $view->homeurl = $this->urlWriter->urlFor('home');
        $view->feedurl = '';
        $view->quote = HordeWeb_Utils::getQuote();

        // This seems to be needed for some helpers to work correctly.
        $view->controller = $this;

        // @TODO: Refactor away the globals
        $view->host_base = $GLOBALS['host_base'];
        $this->setView($view);
    }

    protected function _notFound(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $view->page_title = 'The Horde Project';
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setHeaders(array('Status' => '404 Not Found', 'HTTP/1.0' => '404 Not Found'));
        $response->setBody($layout->render('404'));
    }

    protected function _pageGone(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $view->page_title = '410 - Page Gone';
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setHeaders(array('Status' => '410 Page Gone', 'HTTP/1.0' => '410 Page Gone'));
        $response->setBody($layout->render('410'));
    }

    protected function _addSyntaxhighlighter()
    {
        $GLOBALS['injector']->getInstance('Horde_PageOutput')->addScriptFile('syntaxhighlighter/scripts/shCore.js', 'horde');
        $GLOBALS['injector']->getInstance('Horde_PageOutput')->addScriptFile('syntaxhighlighter/scripts/shAutoloader.js', 'horde');
        $path = $GLOBALS['registry']->get('jsuri', 'horde') . '/syntaxhighlighter/scripts/';
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
              'sass scss              {$path}shBrushSass.js',
              'scala                  {$path}shBrushScala.js',
              'sql                    {$path}shBrushSql.js',
              'vb vbnet               {$path}shBrushVb.js',
              'xml xhtml xslt html    {$path}shBrushXml.js'
            );
EOT;
        $GLOBALS['injector']->getInstance('Horde_PageOutput')->addInlineScript(
            array(
                $brushes,
                'SyntaxHighlighter.defaults[\'toolbar\'] = false',
                'SyntaxHighlighter.all()'
            ),
            'jquery'
        );

        $sh_js_fs = $GLOBALS['registry']->get('jsfs', 'horde') . '/syntaxhighlighter/styles/';
        $sh_js_uri = Horde::url($GLOBALS['registry']->get('jsuri', 'horde'), false, -1) . '/syntaxhighlighter/styles/';
        $css = new Horde_Themes_Element('shCoreEclipse.css', array('data' => array('fs' => $sh_js_fs . 'shCoreEclipse.css', 'uri' => $sh_js_uri . 'shCoreEclipse.css')));
        $GLOBALS['injector']->getInstance('Horde_PageOutput')->addStylesheet($css->fs, $css->uri);
        $css = new Horde_Themes_Element('shThemeEclipse.css', array('data' => array('fs' => $sh_js_fs . 'shThemeEclipse.css', 'uri' => $sh_js_uri . 'shThemeEclipse.css')));
        $GLOBALS['injector']->getInstance('Horde_PageOutput')->addStylesheet($css->fs, $css->uri);
    }

}

