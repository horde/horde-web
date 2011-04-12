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
class HordeWeb_Licenses_Controller extends HordeWeb_Controller_Base
{
    /**
     *
     *
     * @param Horde_Controller_Response $response
     */
    protected function _processRequest(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $base = $GLOBALS['fs_base'] . '/app/views/Licenses/';
        switch ($this->_matchDict->action) {
        case 'index':
            $this->page_title = 'Licenses - The Horde Project';
            break;
        case 'gpl':
            $view->license = file($base . 'COPYING');
            break;
        case 'lgpl':
            $view->license = file($base . 'LGPL');
            break;
        case 'bsd':
            $view->license = file($base . 'COPYRIGHT');
            break;
        case 'apache':
            $view->license = file($base . 'LICENSE');
            break;

        default:
            $this->_notFound($response);
            return;
        }
        $template = $this->_matchDict->action;
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
            array($GLOBALS['fs_base'] . '/app/views/Licenses'));
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
