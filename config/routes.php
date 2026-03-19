<?php
/**
 * Set up the routes for this site
 *
 */

use Horde\Routes\RouteBuilder;

$_root = ltrim(dirname($_SERVER['PHP_SELF']), '/');

// Home controller routes (modern RouteBuilder pattern)
$mapper->addRoute(
    (new RouteBuilder($_root . '/'))
        ->withName('home')
        ->withController('home')
        ->withAction('index')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/contact/'))
        ->withName('contact')
        ->withController('home')
        ->withAction('contact')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/thanks'))
        ->withName('thanks')
        ->withController('home')
        ->withAction('thanks')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/logos'))
        ->withName('logos')
        ->withController('home')
        ->withAction('logos')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/410'))
        ->withController('home')
        ->withAction('410')
);

// Legacy routes (old connect() style) - TODO: Migrate to RouteBuilder
$mapper->connect('mail', $_root . '/mail', array('controller' => 'home', 'action' => 'mail'));

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
$mapper->connect($_root . '/apps/:app/screenshots_old', array('controller' => 'app', 'action' => 'screenshots_old'));

/* Libraries */
$mapper->connect('libraries', $_root . '/libraries', array('controller' => 'library', 'action' => 'index'));
$mapper->connect($_root . '/libraries/:library/docs/:file', array('controller' => 'library', 'action' => 'docs'));
$mapper->connect('library', $_root . '/libraries/:library', array('controller' => 'library', 'action' => 'library'));
$mapper->connect('library', $_root . '/libraries/:library/:action', array('controller' => 'library'));

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
