<?php
/**
 * Set up the routes for this site
 *
 */

use Horde\Routes\RouteBuilder;
use Horde\Hordeweb\Controller\Home;
use Horde\Hordeweb\Controller\Community;
use Horde\Hordeweb\Controller\Licenses;
use Horde\Hordeweb\Controller\Support;
use Horde\Hordeweb\Controller\App;
use Horde\Hordeweb\Controller\Library;
use Horde\Hordeweb\Controller\Development;
use Horde\Hordeweb\Controller\Services;
use Horde\Hordeweb\Controller\Download;
use Horde\Hordeweb\Controller\Shop;

$_root = ltrim(dirname($_SERVER['PHP_SELF']), '/');

// Home controller routes (modern RouteBuilder pattern)
$mapper->addRoute(
    (new RouteBuilder($_root . '/'))
        ->withName('home')
        ->withController(Home::class)
        ->withAction('index')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/contact/'))
        ->withName('contact')
        ->withController(Home::class)
        ->withAction('contact')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/thanks'))
        ->withName('thanks')
        ->withController(Home::class)
        ->withAction('thanks')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/logos'))
        ->withName('logos')
        ->withController(Home::class)
        ->withAction('logos')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/410'))
        ->withController(Home::class)
        ->withAction('410')
);

// Mail
$mapper->addRoute(
    (new RouteBuilder($_root . '/mail'))
        ->withName('mail')
        ->withController(Home::class)
        ->withAction('mail')
);

/* Community */
$mapper->addRoute(
    (new RouteBuilder($_root . '/community/:action'))
        ->withName('community')
        ->withController(Community::class)
        ->withAction('index')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/community/localization'))
        ->withName('localization')
        ->withController(Community::class)
        ->withAction('localization')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/community/team'))
        ->withName('team')
        ->withController(Community::class)
        ->withAction('team')
);

/* Licenses */
$mapper->addRoute(
    (new RouteBuilder($_root . '/licenses/:action'))
        ->withName('licenses')
        ->withController(Licenses::class)
        ->withAction('index')
);

/* Support */
$mapper->addRoute(
    (new RouteBuilder($_root . '/support/:action'))
        ->withName('support')
        ->withController(Support::class)
        ->withAction('index')
);

/* Apps */
$mapper->addRoute(
    (new RouteBuilder($_root . '/apps'))
        ->withName('apps')
        ->withController(App::class)
        ->withAction('index')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/apps/:app/docs/:file'))
        ->withController(App::class)
        ->withAction('docs')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/apps/:app/:action'))
        ->withName('app')
        ->withController(App::class)
        ->withAction('app')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/apps/:app/screenshots'))
        ->withController(App::class)
        ->withAction('screenshots')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/apps/:app/screenshots_old'))
        ->withController(App::class)
        ->withAction('screenshots_old')
);

/* Libraries */
$mapper->addRoute(
    (new RouteBuilder($_root . '/libraries'))
        ->withName('libraries')
        ->withController(Library::class)
        ->withAction('index')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/libraries/:library/docs/:file'))
        ->withController(Library::class)
        ->withAction('docs')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/libraries/:library'))
        ->withName('library')
        ->withController(Library::class)
        ->withAction('library')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/libraries/:library/:action'))
        ->withController(Library::class)
);

/* Development */
$mapper->addRoute(
    (new RouteBuilder($_root . '/development/:action'))
        ->withName('development')
        ->withController(Development::class)
        ->withAction('index')
);

/* Services */
$mapper->addRoute(
    (new RouteBuilder($_root . '/services/:action'))
        ->withName('services')
        ->withController(Services::class)
        ->withAction('index')
);

/* Downloads */
$mapper->addRoute(
    (new RouteBuilder($_root . '/download'))
        ->withName('download')
        ->withController(Download::class)
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/download/:app'))
        ->withController(Download::class)
        ->withAction('app')
);

/* Shop */
$mapper->addRoute(
    (new RouteBuilder($_root . '/shop/us'))
        ->withName('shopus')
        ->withController(Shop::class)
        ->withAction('us')
);

$mapper->addRoute(
    (new RouteBuilder($_root . '/shop/eu'))
        ->withName('shopeu')
        ->withController(Shop::class)
        ->withAction('eu')
);
