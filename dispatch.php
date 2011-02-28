<?php
/**
 * Main dispatch page
 */
require_once dirname(__FILE__) . '/app/lib/base.php';

$request = $GLOBALS['injector']->getInstance('Horde_Controller_Request');
$runner = $injector->getInstance('Horde_Controller_Runner');

$_root = ltrim(dirname($_SERVER['PHP_SELF']), '/');
$mapper = $GLOBALS['injector']->getInstance('Horde_Routes_Mapper');

/* Routes */
$mapper->connect('home', $_root . '/', array('controller' => 'home'));

/* Community */
$mapper->connect('community', $_root . '/community/:action', array('controller' => 'community', 'action' => 'index'));
$mapper->connect('localization', $_root . '/community/localization', array('controller' => 'community', 'action' => 'localization'));

/* Apps */
$mapper->connect('apps', $_root . '/apps', array('controller' => 'app'));
$mapper->connect('app', $_root . '/apps/:app/:action', array('controller' => 'app', 'action' => 'app'));
$mapper->connect($_root . '/apps/:app/screenshot', array('controller' => 'app', 'action' => 'screenshot'));

/* Downloads */
$mapper->connect(
    'download', $_root . '/download', array('controller' => 'download', 'action' => 'index'));
$mapper->connect(
    $_root . '/download/:app', array('controller' => 'download', 'action' => 'app'));


$path = $request->getPath();
if (($pos = strpos($path, '?')) !== false) {
    $path = substr($path, 0, $pos);
}
if (!$path) $path = '/';
$match = $mapper->match($path);
//var_dump($match);
$config = new Horde_Core_Controller_RequestConfiguration();
if (empty($match['controller']) || !class_exists('HordeWeb_' . ucfirst($match['controller']) . '_Controller')) {
    $match['controller'] = 'home';
}
$config->setControllerName('HordeWeb_' . ucfirst($match['controller']) . '_Controller');
$response = $runner->execute($injector, $request, $config);
$responseWriter = $injector->getInstance('Horde_Controller_ResponseWriter');
$responseWriter->writeResponse($response);
