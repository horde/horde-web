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
            return;
        case 'contact':
            $view->page_title = 'Contact Us - The Horde Project';
            $template = 'contactus';
            break;
        case 'mail':
            $view->page_title = 'Mailing Lists - The Horde Project';
            $view->lists = HordeWeb_Utils::getLists();
            $template = 'mail';
            break;
        case 'thanks':
            $view->page_title = 'Thanks - The Horde Project';
            $template = 'thanks';
            break;
        default:
            $this->_notFound($response);
            return;
        }

        $view = $this->getView();
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
        $cache = $GLOBALS['injector']->getInstance('Horde_Cache');

        // Get the planet feed.
        if ($planet = $cache->get('planet', 600)) {
            $view->planet = unserialize($planet);
        } else {
            try {
                $view->planet = Horde_Feed::readUri('http://planet.horde.org/rss/');
            } catch (Exception $e) {
                $view->planet = null;
            }
            $cache->set('planet', serialize($view->planet));
        }

        // Get the complete Horde feed (no tags)
        if ($hordefeed = $cache->get('hordefeed', 600)) {
            $view->hordefeed = unserialize($hordefeed);
        } else {
            try {
                $view->hordefeed = Horde_Feed::readUri($GLOBALS['feed_url']);
            } catch (Exception $e) {
                $view->hordefeed = null;
            }
            $cache->set('hordefeed', serialize($view->hordefeed));
        }

        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('home');
        $response->setBody($layout->render('index'));
    }

}
