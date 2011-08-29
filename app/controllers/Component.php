<?php
/**
 * Component controller class
 *
 * Handles requests to the component pages.
 *
 * Copyright 2011 Horde LLC (http://www.horde.org)
 *
 * @license  http://opensource.org/licenses/bsd-license.php BSD
 * @author Michael J Rubinsky <mrubinsk@horde.org>
 * @author Gunnar Wrobel <wrobel@horde.org>
 */
class HordeWeb_Component_Controller extends HordeWeb_Controller_Base
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
        case 'component':
            $this->_component($response);
            break;
        case 'authors':
            $this->_authors($response);
            break;
        case 'docs':
            $this->_docs($response);
            break;
        case 'examples':
            $this->_examples($response);
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
            array($GLOBALS['fs_base'] . '/app/views/Component',
                  $GLOBALS['fs_base'] . '/app/views/Component/components/' . $this->_matchDict->component));
        $view->componentName = $this->_matchDict->component;
        $view->shortComponentName = str_replace('Horde_', '', $view->componentName);
        $view->components = HordeWeb_Utils::getComponents()->listComponents();
    }

    /**
     * Components list page
     */
    protected function _index(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $view->page_title = 'Horde PHP Libraries';
        $view->componentListController = array('controller' => 'component', 'action' => '');
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render('index'));
    }

    /**
     *
     * Specific component page
     *
     * @param Horde_Controller_Response $response
     */
    protected function _component(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');

        // Do we know about this component?
        if (!in_array($view->componentName, $view->components)) {
            $view->page_title = '404 Not Found';
            $template = '404';
        } else {
            $view->page_title = $view->shortComponentName . ' - The Horde Project';
            $template = 'component';
            $view->componentDetails = HordeWeb_Utils::getComponents()->fetchComponent($view->componentName);
        }
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render($template));
    }
}
