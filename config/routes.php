<?php
/**
 * Set up the routes for this site
 *
 */

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

/* Home controller routes */
$mapper->route($_root . '/')
    ->withName('home')
    ->withController(Home::class)
    ->withAction('index')
    ->add();

$mapper->route($_root . '/contact/')
    ->withName('contact')
    ->withController(Home::class)
    ->withAction('contact')
    ->add();

$mapper->route($_root . '/thanks')
    ->withName('thanks')
    ->withController(Home::class)
    ->withAction('thanks')
    ->add();

$mapper->route($_root . '/logos')
    ->withName('logos')
    ->withController(Home::class)
    ->withAction('logos')
    ->add();

$mapper->route($_root . '/410')
    ->withName('410')
    ->withController(Home::class)
    ->withAction('410')
    ->add();

$mapper->route($_root . '/mail')
    ->withName('mail')
    ->withController(Home::class)
    ->withAction('mail')
    ->add();

/* Community */
$mapper->route($_root . '/community/:action')
    ->withName('community')
    ->withController(Community::class)
    ->defaults('action', 'index')
    ->add();

$mapper->route($_root . '/community/team')
    ->withName('team')
    ->withController(Community::class)
    ->withAction('team')
    ->add();

$mapper->route($_root . '/community/localization')
    ->withName('localization')
    ->withController(Community::class)
    ->withAction('localization')
    ->add();

/* Licenses */
$mapper->route($_root . '/licenses/:action')
    ->withName('licenses')
    ->withController(Licenses::class)
    ->defaults('action', 'index')
    ->add();

/* Support */
$mapper->route($_root . '/support')
    ->withName('support')
    ->withController(Support::class)
    ->withAction('index')
    ->add();

/* Apps - main index aliases to h6 */
$mapper->route($_root . '/apps')
    ->withName('apps')
    ->withController(App::class)
    ->withAction('index')
    ->add();

/* Apps - Horde 5 archive */
$mapper->route($_root . '/apps/h5')
    ->withName('apps_h5')
    ->withController(App::class)
    ->withAction('h5')
    ->add();

$mapper->route($_root . '/apps/h5/:app/docs/:file')
    ->withName('app_h5_docs')
    ->withController(App::class)
    ->withAction('docs')
    ->add();

$mapper->route($_root . '/apps/h5/:app')
    ->withName('app_h5')
    ->withController(App::class)
    ->withAction('app')
    ->add();

$mapper->route($_root . '/apps/h5/:app/:action')
    ->withName('app_h5_action')
    ->withController(App::class)
    ->defaults('action', 'app')
    ->withSecondaryRoute($_root . '/apps/h5/:app/screenshots')
    ->withSecondaryRoute($_root . '/apps/h5/:app/screenshots_old')
    ->add();

/* Apps - Horde 6 */
$mapper->route($_root . '/apps/h6')
    ->withName('apps_h6')
    ->withController(App::class)
    ->withAction('h6')
    ->add();

$mapper->route($_root . '/apps/h6/:app/docs/:file')
    ->withName('app_h6_docs')
    ->withController(App::class)
    ->withAction('docs')
    ->add();

$mapper->route($_root . '/apps/h6/:app')
    ->withName('app_h6')
    ->withController(App::class)
    ->withAction('app')
    ->add();

$mapper->route($_root . '/apps/h6/:app/:action')
    ->withName('app_h6_action')
    ->withController(App::class)
    ->defaults('action', 'app')
    ->withSecondaryRoute($_root . '/apps/h6/:app/screenshots')
    ->withSecondaryRoute($_root . '/apps/h6/:app/screenshots_old')
    ->add();

/* Apps - individual app routes (legacy, matches after h5/h6) */
$mapper->route($_root . '/apps/:app/docs/:file')
    ->withName('app_docs')
    ->withController(App::class)
    ->withAction('docs')
    ->add();

$mapper->route($_root . '/apps/:app')
    ->withName('app')
    ->withController(App::class)
    ->withAction('app')
    ->add();

$mapper->route($_root . '/apps/:app/:action')
    ->withName('app_action')
    ->withController(App::class)
    ->defaults('action', 'app')
    ->withSecondaryRoute($_root . '/apps/:app/screenshots')
    ->withSecondaryRoute($_root . '/apps/:app/screenshots_old')
    ->add();

/* Libraries - main index aliases to h6 */
$mapper->route($_root . '/libraries')
    ->withName('libraries')
    ->withController(Library::class)
    ->withAction('index')
    ->add();

/* Libraries - Horde 5 archive */
$mapper->route($_root . '/libraries/h5')
    ->withName('libraries_h5')
    ->withController(Library::class)
    ->withAction('h5')
    ->add();

$mapper->route($_root . '/libraries/h5/:library/docs/:file')
    ->withName('library_h5_docs')
    ->withController(Library::class)
    ->withAction('docs')
    ->add();

$mapper->route($_root . '/libraries/h5/:library')
    ->withName('library_h5')
    ->withController(Library::class)
    ->withAction('library')
    ->add();

$mapper->route($_root . '/libraries/h5/:library/:action')
    ->withName('library_h5_action')
    ->withController(Library::class)
    ->defaults('action', 'library')
    ->add();

/* Libraries - Horde 6 */
$mapper->route($_root . '/libraries/h6')
    ->withName('libraries_h6')
    ->withController(Library::class)
    ->withAction('h6')
    ->add();

$mapper->route($_root . '/libraries/h6/:library/docs/:file')
    ->withName('library_h6_docs')
    ->withController(Library::class)
    ->withAction('docs')
    ->add();

$mapper->route($_root . '/libraries/h6/:library')
    ->withName('library_h6')
    ->withController(Library::class)
    ->withAction('library')
    ->add();

$mapper->route($_root . '/libraries/h6/:library/:action')
    ->withName('library_h6_action')
    ->withController(Library::class)
    ->defaults('action', 'library')
    ->add();

/* Libraries - legacy routes (match after h5/h6) */
$mapper->route($_root . '/libraries/:library/docs/:file')
    ->withName('library_docs')
    ->withController(Library::class)
    ->withAction('docs')
    ->add();

$mapper->route($_root . '/libraries/:library')
    ->withName('library')
    ->withController(Library::class)
    ->withAction('library')
    ->add();

$mapper->route($_root . '/libraries/:library/:action')
    ->withName('library_action')
    ->withController(Library::class)
    ->defaults('action', 'library')
    ->add();

/* Development */
$mapper->route($_root . '/development/:action')
    ->withName('development')
    ->withController(Development::class)
    ->defaults('action', 'index')
    ->add();

/* Services */
$mapper->route($_root . '/services')
    ->withName('services')
    ->withController(Services::class)
    ->withAction('index')
    ->add();

/* Downloads */
$mapper->route($_root . '/download/:app')
    ->withName('download')
    ->withController(Download::class)
    ->withAction('app')
    ->add();

/* Shop */
$mapper->route($_root . '/shop/us')
    ->withName('shopus')
    ->withController(Shop::class)
    ->withAction('us')
    ->add();

$mapper->route($_root . '/shop/eu')
    ->withName('shopeu')
    ->withController(Shop::class)
    ->withAction('eu')
    ->add();
