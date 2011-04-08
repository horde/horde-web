<?php
/**
 * App controller class
 *
 * Handles requests to the application pages.
 *
 * Copyright 2011 Horde LLC (http://www.horde.org)
 *
 * @license  http://opensource.org/licenses/bsd-license.php BSD
 * @author Michael J Rubinsky <mrubinsk@horde.org>
 */
class HordeWeb_App_Controller extends HordeWeb_Controller_Base
{
    /**
     *
     *
     * @param Horde_Controller_Response $response
     */
    protected function _processRequest(Horde_Controller_Response $response)
    {
        switch ($this->_matchDict->action) {
        case 'index':
            $this->_index($response);
            break;
        case 'app':
            $this->_app($response);
            break;
        case 'authors':
            $this->_authors($response);
            break;
        case 'docs':
            $this->_docs($response);
            break;
        case 'screenshots':
            $this->_screenshots($response);
            break;
        case 'roadmap':
            $this->_roadmap($response);
            break;
        default:
            $this->_notFound($response);

        }
    }

    /**
     *
     */
    protected function _setup()
    {
        parent::_setup();
        $view = $this->getView();
        $view->addTemplatePath(
            array($GLOBALS['fs_base'] . '/app/views/App',
                  $GLOBALS['fs_base'] . '/app/views/App/apps/' . $this->_matchDict->app));
        $view->appname = $this->_matchDict->app;
        $view->hasAuthors = file_exists($GLOBALS['fs_base'] . '/app/views/App/apps/' . $this->_matchDict->app . '/appauthors.html.php');
        $view->hasDocs = file_exists($GLOBALS['fs_base'] . '/app/views/App/apps/' . $this->_matchDict->app . '/docs');
        $view->hasScreenshots = file_exists($GLOBALS['fs_base'] . '/app/views/App/apps/' . $this->_matchDict->app . '/appscreenshots.html.php');
        $view->hasRoadmap = file_exists($GLOBALS['fs_base'] . '/app/views/App/apps/' . $this->_matchDict->app . '/approadmap.html.php');
    }

    protected function _index(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        // @TODO: Look this up in some kind of config/lookup array.
        $app = $this->_matchDict->app == 'imp'
            ? Horde_String::upper($this->_matchDict->app)
            : Horde_String::ucfirst($this->_matchDict->app);
        $view->page_title = $app . ' - The Horde Project';
        $view->stable = HordeWeb_Utils::getStableApps();
        $view->appListController = array('controller' => 'app', 'action' => 'app');
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render('index'));
    }

    /**
     *
     * @param Horde_Controller_Response $response
     */
    protected function _app(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $view->page_title = ucfirst($this->_matchDict->app) . ' - The Horde Project';
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $template = 'app';
        // Do we know about this app?
        if (file_exists($GLOBALS['fs_base'] . '/app/views/App/apps/' . urlencode($this->_matchDict->app)) === false) {
            $view->page_title = '404 Not Found';
            $template = '404';
        }

        // Build the bug/news widget
        // The tag for the search should *normally* be the app name...might need
        // to tweak this.
        // @TODO allow multiple feeds and add cache
        $slugs = array($this->_matchDict->app);
        foreach ($slugs as $slug) {
            $base_feed_url = Horde::url($GLOBALS['feed_url'])->add('tag_id', $slug)->setRaw(true);
            $view->latestNews = Horde_Feed::readUri($base_feed_url);
        }
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render($template));
    }

    protected function _authors(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $view->addTemplatePath(array($GLOBALS['fs_base'] . '/app/views/shared/authors'));
        $view->page_title = 'Authors - ' . ucfirst($view->appname) . ' - The Horde Project';
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render('authors'));
    }

    protected function _roadmap(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $view->page_title = 'Roadmap - ' . ucfirst($view->appname) . ' - The Horde Project';
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render('roadmap'));
    }

    protected function _docs(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $view->page_title = 'Documentation - ' . ucfirst($view->appname) . ' - The Horde Project';
        Horde::startBuffer();
        $file = Horde_Util::getFormData('f', 'docs.html');
        include $GLOBALS['fs_base'] . '/app/views/App/apps/' . $this->_matchDict->app . '/docs/' . $file;
        $view->content = Horde::endBuffer();
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render('docs'));
    }

    protected function _screenshots(Horde_Controller_Response $response)
    {
        $GLOBALS['injector']->getInstance('Horde_Script_Files')->prototypejs = false;
        Horde::addScriptFile($GLOBALS['host_base'] . '/js/jquery-1.4.4.min.js', 'horde', array('external' => true));
        Horde::addScriptFile($GLOBALS['host_base'] . '/js/jquery.lightbox-0.5.min.js', 'horde', array('external' => true));
        $css = $GLOBALS['injector']->getInstance('Horde_Themes_Css');
        $css->addStylesheet($GLOBALS['fs_base'] . '/css/jquery.lightbox-0.5.css', $GLOBALS['host_base'] . '/css/jquery.lightbox-0.5.css');

        $js = '$(function() { $("a.lightbox").lightBox(
            {"imageBtnPrev": "' . $GLOBALS['host_base'] . '/images/lightbox-btn-prev.gif",
             "imageBtnNext": "' . $GLOBALS['host_base'] . '/images/lightbox-btn-next.gif",
             "imageLoading": "' . $GLOBALS['host_base'] . '/images/lightbox-ico-loading.gif",
             "imageBtnClose": "' . $GLOBALS['host_base'] . '/images/lightbox-btn-close.gif",
             "imageBlank": "' . $GLOBALS['host_base'] . '/images/lightbox-blank.gif"});})';
        Horde::addInlineScript($js);
        $view = $this->getView();
        $view->page_title = 'Screenshots - ' . ucfirst($view->appname) . ' - The Horde Project';
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render('screenshots'));
    }

}
