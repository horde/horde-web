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
     * @var Horde_Routes_Matcher the match dictionary handler
     */
    protected $_matcher;

    /**
     *
     * @var Horde_Support_Array  The match dictionary.
     */
    protected $_matchDict;

    /**
     *
     * @var Horde_Controller_UrlWriter
     */
    public $urlWriter;

    /**
     * Constructor.
     *
     * @param Horde_Routes_Matcher $matcher  The match dictionary.
     */
    public function __construct(Horde_Routes_Matcher $matcher)
    {
        $this->_matcher = $matcher;
    }

    /**
     *
     *
     * @param Horde_Controller_Request $request
     * @param Horde_Controller_Response $response
     */
    public function processRequest(Horde_Controller_Request $request, Horde_Controller_Response $response)
    {
        $this->_matchDict = $this->_matcher->getMatchDict();
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
        $view->quote = HordeWeb_Utils::getQuote();

        // This seems to be needed for some helpers to work correctly.
        $view->controller = $this;

        // @TODO: Refactor away the globals
        $view->host_base = $GLOBALS['host_base'];
        $this->setView($view);
    }

    protected function _notFound(Horde_Contoller_Response $response)
    {
        $view = $this->getView();
        $view->page_title = 'The Horde Project';
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setHeaders(array('Status' => '404 Not Found', 'HTTP/1.0' => '404 Not Found'));
        $response->setBody($layout->render('404'));
    }

    protected function _pageGone(Horde_Contoller_Response $response)
    {
        $view = $this->getView();
        $view->page_title = '410 - Page Gone';
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setHeaders(array('Status' => '410 Page Gone', 'HTTP/1.0' => '410 Page Gone'));
        $response->setBody($layout->render('410'));
    }

}

