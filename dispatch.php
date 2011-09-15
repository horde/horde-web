<?php
/**
 * Main dispatch page
 */
require_once dirname(__FILE__) . '/app/lib/base.php';

$request = $injector->getInstance('Horde_Controller_Request');
$runner = $injector->getInstance('Horde_Controller_Runner');

$match = $injector->getInstance('Horde_Routes_Matcher')->getMatchDict();
$config = new Horde_Core_Controller_RequestConfiguration();
if (empty($match['controller']) || !class_exists('HordeWeb_' . ucfirst($match['controller']) . '_Controller')) {
    $match['controller'] = 'home';
}
$config->setControllerName('HordeWeb_' . ucfirst($match['controller']) . '_Controller');
$response = $runner->execute($injector, $request, $config);
$responseWriter = $injector->getInstance('Horde_Controller_ResponseWriter');
$responseWriter->writeResponse($response);
