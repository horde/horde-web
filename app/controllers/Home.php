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
     * @param Horde_Controller_Request $request
     * @param Horde_Controller_Response $response
     */
    public function processRequest(Horde_Controller_Request $request, Horde_Controller_Response $response)
    {
        // Need to rematch since we need a copy of the matchDict.
        // @TODO: This should be somehow injected into the class on instantiation
        $this->_mapper = $GLOBALS['injector']->getInstance('Horde_Routes_Mapper');
        $this->_matchDict = new Horde_Support_Array($this->_mapper->match($request->getPath()));
        $this->_setup();
        switch ($this->_matchDict->action) {
        case 'index':
            $this->_index($response);
            break;
        }
    }

    /**
     *
     */
    protected function _setup()
    {
        parent::_setup();
        $view = $this->getView();
        $view->addTemplatePath(array($GLOBALS['fs_base'] . '/app/views/Home', $GLOBALS['fs_base'] . '/app/views/shared'));
    }

    /**
     *
     * @param Horde_Controller_Response $response
     */
    protected function _index(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $view->page_title = 'The Horde Project';
        $view->maxHordeItems = 3;
        $view->maxPlanetItems = 5;
        $view->quote = HordeWeb_Utils::getQuote();
        // Get the planet feed.
        $planet = '';
        try {
            $view->planet = Horde_Feed::readUri('http://planet.horde.org/rss/');
        } catch (Exception $e) {
            $view->planet = null;
        }

        // Get the Horde feed, for whatever that's currently worth. Just
        // release announcements at the moment. Probably replace with a
        // local Jonah feed.
        try {
            $view->hordefeed = Horde_Feed::readUri('http://horde.org/atom.php');
        } catch (Exception $e) {
            $view->hordefeed = null;
        }

        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('home');
        $response->setBody($layout->render('index'));
    }

}
