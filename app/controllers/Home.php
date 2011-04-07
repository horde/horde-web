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
class HordeWeb_Home_Controller extends HordeWeb_Controller_Base
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
        case 'contact':
            $this->_contact($response);
            break;
        case 'mail':
            $this->_mail($response);
            break;
        default:
            $this->_notFound($response);
        }
    }

    protected function _setup()
    {
        parent::_setup();
        $view = $this->getView();
        $view->addTemplatePath(
            array($GLOBALS['fs_base'] . '/app/views/Home'));
    }

    /**
     *
     * @param Horde_Controller_Response $response
     */
    protected function _index(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $view->page_title = 'The Horde Project';
        $view->maxHordeItems = 5;
        $view->maxPlanetItems = 5;

        // Get the planet feed.
        $cache = $GLOBALS['injector']->getInstance('Horde_Cache');
        if (!$view->planet = $cache->get('planet', 600)) {
            try {
                $view->planet = Horde_Feed::readUri('http://planet.horde.org/rss/');
            } catch (Exception $e) {
                $view->planet = null;
            }
            $cache->set('planet', $view->planet);
        }

        // Get the complete Horde feed (no tags)
        $cache = $GLOBALS['injector']->getInstance('Horde_Cache');
        if (!$view->hordefeed = $cache->get('hordefeed', 600)) {
            try {
                $view->hordefeed = Horde_Feed::readUri($GLOBALS['feed_url']);
            } catch (Exception $e) {
                $view->hordefeed = null;
            }
            $cache->set('hordefeed', $view->hordefeed);
        }

        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('home');
        $response->setBody($layout->render('index'));
    }

    protected function _contact(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $view->page_title = 'Contact Us - The Horde Project';

        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render('contactus'));

    }

    protected function _mail(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $view->page_title = 'Mailing Lists - The Horde Project';
        $view->lists = HordeWeb_Utils::getLists();
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render('mail'));

    }

}
