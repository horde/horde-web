<?php
/**
 * Main controller class
 *
 * Handles requests to the main home page.
 *
 * Copyright 2011 Horde LLC (http://www.horde.org)
 *
 * @license  http://opensource.org/licenses/bsd-license.php BSD
 * @author Michael J Rubinsky <mrubinsk@horde.org>
 */
class HordeWeb_Development_Controller extends HordeWeb_Controller_Base
{
    /**
     *
     *
     * @param Horde_Controller_Response $response
     */
    protected function _processRequest(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        switch ($this->_matchDict->action) {
        case 'index':
            $view->page_title = 'Development - The Horde Project';
            $template = 'index';
            break;
        case 'git':
        case 'cvs':
            Horde::addScriptFile('syntaxhighlighter/scripts/shCore.js', 'horde');
            Horde::addScriptFile('syntaxhighlighter/scripts/shAutoloader.js', 'horde');
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
            Horde::addInlineScript(array(
                $brushes,
                'SyntaxHighlighter.defaults[\'toolbar\'] = false',
                'SyntaxHighlighter.all()'
            ), 'dom');

            $sh_js_fs = $GLOBALS['registry']->get('jsfs', 'horde') . '/syntaxhighlighter/styles/';
            $sh_js_uri = Horde::url($GLOBALS['registry']->get('jsuri', 'horde'), false, -1) . '/syntaxhighlighter/styles/';
            $css = $GLOBALS['injector']->getInstance('Horde_Themes_Css');
            $css->addStylesheet($sh_js_fs . 'shCoreEclipse.css', $sh_js_uri . 'shCoreEclipse.css');
            $css->addStylesheet($sh_js_fs . 'shThemeEclipse.css', $sh_js_uri . 'shThemeEclipse.css');
            // fall through
        case 'contribute':
        case 'documentation':
        case 'licenses':
        case 'modules':
        case 'versions':
            $view->page_title = ucfirst($this->_matchDict->action) . ' - The Horde Project';
            $template = $this->_matchDict->action;
            if ($this->_matchDict->action == 'modules') {
                Horde::addScriptFile('stripe.js');
            }
            break;

        default:
            $this->_notFound($response);
            return;
        }

        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render($template));
    }

    protected function _setup()
    {
        parent::_setup();
        $view = $this->getView();
        $view->addTemplatePath(
            array($GLOBALS['fs_base'] . '/app/views/Development'));
    }

    public function cvs_and_ver($module)
    {
        $horde_apps_stable = HordeWeb_Utils::getStableApps();
        $horde_apps_dev = HordeWeb_Utils::getDevApps();
        return '<td><a href="http://cvs.horde.org/' . htmlspecialchars($module) . '/">' . htmlspecialchars($module) . '</a>'
            . '</td><td>' . (isset($horde_apps_stable[$module]) ? htmlspecialchars($horde_apps_stable[$module]['ver']) : (isset($horde_apps_dev[$module]) ? htmlspecialchars($horde_apps_dev[$module]['ver']) : '&nbsp;'))
            . '</td>';
    }
}
