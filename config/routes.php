<?php
/**
 * Set up the routes for this site
 *
 */

$_root = ltrim(dirname($_SERVER['PHP_SELF']), '/');
$mapper->connect('home', $_root . '/', array('controller' => 'home'));
$mapper->connect('contact', $_root . '/contact/', array('controller' => 'home', 'action' => 'contact'));
$mapper->connect('mail', $_root . '/mail', array('controller' => 'home', 'action' => 'mail'));
$mapper->connect('thanks', $_root . '/thanks', array('controller' => 'home', 'action' => 'thanks'));
$mapper->connect('logos', $_root . '/logos', array('controller' => 'home', 'action' => 'logos'));
$mapper->connect($_root . '/410', array('controller' => 'home', 'action' => '410'));

/* Community */
$mapper->connect('community', $_root . '/community/:action', array('controller' => 'community', 'action' => 'index'));
$mapper->connect('localization', $_root . '/community/localization', array('controller' => 'community', 'action' => 'localization'));
$mapper->connect('team', $_root . '/community/team', array('controller' => 'community', 'action' => 'team'));

/* Licenses */
$mapper->connect('licenses', $_root . '/licenses/:action', array('controller' => 'licenses', 'action' => 'index'));

/* Support */
$mapper->connect('support', $_root . '/support/:action', array('controller' => 'support', 'action' => 'index'));

/* Apps */
$mapper->connect('apps', $_root . '/apps', array('controller' => 'app', 'action' => 'index'));
$mapper->connect($_root . '/apps/:app/docs/:file', array('controller' => 'app', 'action' => 'docs'));
$mapper->connect('app', $_root . '/apps/:app/:action', array('controller' => 'app', 'action' => 'app'));
$mapper->connect($_root . '/apps/:app/screenshots', array('controller' => 'app', 'action' => 'screenshots'));

/* Components */
$mapper->connect('components', $_root . '/components', array('controller' => 'component', 'action' => 'index'));
$mapper->connect('component', $_root . '/components/:component', array('controller' => 'component', 'action' => 'component'));
$mapper->connect('component', $_root . '/components/:component/:action', array('controller' => 'component'));

/* Development */
$mapper->connect('development', $_root . '/development/:action', array('controller' => 'development', 'action' => 'index'));

/* Services */
$mapper->connect('services', $_root . '/services/:action', array('controller' => 'services', 'action' => 'index'));

/* Downloads */
$mapper->connect(
    'download', $_root . '/download', array('controller' => 'download'));
$mapper->connect(
    $_root . '/download/:app', array('controller' => 'download', 'action' => 'app'));

/* Shop */
$mapper->connect('shopus', $_root . '/shop/us', array('controller' => 'shop', 'action' => 'us'));
$mapper->connect('shopeu', $_root . '/shop/eu', array('controller' => 'shop', 'action' => 'eu'));
