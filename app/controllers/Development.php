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
            $view->page_title = 'The Horde Project::Development';
            $template = 'index';
            break;
        case 'contribute':
        case 'docs':
        case 'git':
            $view->page_title = 'The Horde Project::' . ucfirst($this->_matchDict->action);
            $template = $this->_matchDict->action;
            break;
        case 'cvs':
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

}
