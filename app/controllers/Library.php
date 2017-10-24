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
            $this->_addSyntaxhighlighter();
            $this->_index($response);
            break;
        case 'library':
            $this->_library($response);
            break;
        case 'download':
            $this->_addSyntaxhighlighter();
            $this->_download($response);
            break;
        case 'docs':
            $this->_docs($response);
            break;
        default:
            $this->_notFound($response);
            return;
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

        if ($this->_isKnownLibrary($view)) {
            $template = 'library';
        } else {
            $template = '404';
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

        if ($this->_isKnownLibrary($view)) {
            $template = 'download';
        } else {
            $template = '404';
        }
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render($template));
    }

    /**
     * Library documentation section.
     *
     * @param Horde_Controller_Response $response
     */
    protected function _docs(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');

        if ($this->_isKnownLibrary($view)) {
            $template = 'docs';
            Horde::startBuffer();
            include $GLOBALS['fs_base'] . '/app/views/Library/libraries/' . $view->libraryName . '/docs/' . ($this->_matchDict->file ? $this->_matchDict->file : 'docs') . '.html';
            $view->content = Horde::endBuffer();
        } else {
            $template = '404';
        }

        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render($template));
    }

    /**
     * Is the library known?
     *
     * @param Horde_View $view The current view.
     *
     * @return The name of the template that should be used for display.
     */
    private function _isKnownLibrary($view)
    {
        if (!in_array($view->libraryName, $view->libraries)) {
            $view->page_title = '404 Not Found';
            return false;
        } else {
            $view->page_title = $view->shortLibraryName . ' library - The Horde Project';
            $view->libraryDetails = HordeWeb_Utils::getLibraries()->fetchLibrary($view->libraryName);
            return true;
        }
    }
}
