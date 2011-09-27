<?php
/**
 * Library controller class
 *
 * Handles requests to the library pages.
 *
 * Copyright 2011 Horde LLC (http://www.horde.org)
 *
 * @license  http://opensource.org/licenses/bsd-license.php BSD
 * @author Michael J Rubinsky <mrubinsk@horde.org>
 * @author Gunnar Wrobel <wrobel@horde.org>
 */
class HordeWeb_Library_Controller extends HordeWeb_Controller_Base
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
        case 'library':
            $this->_library($response);
            break;
        case 'download':
            $this->_download($response);
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
            array($GLOBALS['fs_base'] . '/app/views/Library',
                  $GLOBALS['fs_base'] . '/app/views/Library/libraries/' . $this->_matchDict->library));
        $view->libraryName = $this->_matchDict->library;
        $view->shortLibraryName = str_replace('Horde_', '', $view->libraryName);
        $view->libraries = HordeWeb_Utils::getLibraries()->listLibraries();
    }

    /**
     * Libraries list page
     */
    protected function _index(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $view->page_title = 'Horde PHP Libraries';
        $view->libraryListController = array('controller' => 'library', 'action' => '');
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render('index'));
    }

    /**
     * Specific library page
     *
     * @param Horde_Controller_Response $response
     */
    protected function _library(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');

        // Do we know about this library?
        if (!in_array($view->libraryName, $view->libraries)) {
            $view->page_title = '404 Not Found';
            $template = '404';
        } else {
            $view->page_title = $view->shortLibraryName . ' library - The Horde Project';
            $template = 'library';
            $view->libraryDetails = HordeWeb_Utils::getLibraries()->fetchLibrary($view->libraryName);
        }
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render($template));
    }

    /**
     * Library download section.
     *
     * @param Horde_Controller_Response $response
     */
    protected function _download(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');

        // Do we know about this library?
        if (!in_array($view->libraryName, $view->libraries)) {
            $view->page_title = '404 Not Found';
            $template = '404';
        } else {
            $view->page_title = 'Download ' . $view->libraryName . ' - The Horde Project';
            $template = 'download';
            $view->libraryDetails = HordeWeb_Utils::getLibraries()->fetchLibrary($view->libraryName);
        }
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render($template));
    }
}
