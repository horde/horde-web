<?php
/**
 * Base class for HordeWeb controllers.
 *
 * Copyright 2011 Horde LLC (http://www.horde.org)
 *
 * @author mrubinsk
 */
abstract class HordeWeb_Controller_Base extends Horde_Controller_Base
{
    /**
     *
     * @var array  The match dictionary returned from the mapper.
     */
    protected $_matchDict;

    /**
     *
     * @var Horde_Controller_Mapper
     */
    protected $_mapper;

    /**
     *
     * @var Horde_Controller_UrlWriter
     */
    public $urlWriter;

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
        $this->_processRequest($response);
    }

    /**
     * Setup needed properties
     *
     */
    protected function _setup()
    {
        global $site_name;

        // Set the view, with correct template path set by the binder
        $view = $GLOBALS['injector']->getInstance('HordeWeb_View');

        $this->urlWriter = $view->urlWriter = $this->getUrlWriter();
        $view->homeurl = $this->urlWriter->urlFor('home');
        $view->feedurl = '';

        // @TODO: Refactor away the globals
        $view->host_base = $GLOBALS['host_base'];
        $this->setView($view);
    }

}

