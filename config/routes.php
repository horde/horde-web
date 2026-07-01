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
use Horde\Hordeweb\Controller\Diagnostics;
use Horde\Hordeweb\Controller\Library;
use Horde\Hordeweb\Controller\Development;
use Horde\Hordeweb\Controller\Services;
use Horde\Hordeweb\Controller\Download;
use Horde\Hordeweb\Controller\Shop;
use Horde\Hordeweb\Middleware\LegacyBootstrap;
use Horde\Core\Middleware\HordeCore;
use Horde\Core\Middleware\ErrorFilter;
use Horde\Routes\GroupMapper;

/*
 * All hordeweb routes share the same middleware stack:
 *
 *   HordeCore       — bootstraps the legacy Horde framework (registry,
 *                     $GLOBALS['injector'], factories) that hordeweb's
 *                     controllers reach into.
 *   ErrorFilter     — renders exceptions as the Horde error page instead
 *                     of leaking stack traces.
 *   LegacyBootstrap — hordeweb-specific: require_once app/lib/base.php
 *                     so PSR-0 mappers, $GLOBALS['fs_base']/$host_base and
 *                     the bindFactory('HordeWeb_View', ...) call are in
 *                     place before the controller runs.
 *
 * hordeweb is a fully public site; no AuthHordeSession/RedirectToLogin.
 * Under horde/rampage.php this stack overrides the DefaultStack (which
 * would demand authentication). Under hordeweb's own dispatch.php the
 * stack is currently informational — dispatch.php runs the controller
 * directly — but declaring it here keeps both entry points in sync and
 * lets future work reuse the same middleware pipeline for standalone.
 */
$mapper->group(
    ['stack' => [HordeCore::class, ErrorFilter::class, LegacyBootstrap::class]],
    function (GroupMapper $mapper) {
        /* Home controller routes */
        $mapper->buildRoute('/')
            ->withName('home')
            ->withController(Home::class)
            ->withAction('index')
            ->add();

        $mapper->buildRoute('/contact/')
            ->withName('contact')
            ->withController(Home::class)
            ->withAction('contact')
            ->add();

        $mapper->buildRoute('/thanks')
            ->withName('thanks')
            ->withController(Home::class)
            ->withAction('thanks')
            ->add();

        $mapper->buildRoute('/logos')
            ->withName('logos')
            ->withController(Home::class)
            ->withAction('logos')
            ->add();

        $mapper->buildRoute('/410')
            ->withName('410')
            ->withController(Home::class)
            ->withAction('410')
            ->add();

        $mapper->buildRoute('/mail')
            ->withName('mail')
            ->withController(Home::class)
            ->withAction('mail')
            ->add();

        /* Community */
        $mapper->buildRoute('/community/:action')
            ->withName('community')
            ->withController(Community::class)
            ->defaults('action', 'index')
            ->add();

        $mapper->buildRoute('/community/team')
            ->withName('team')
            ->withController(Community::class)
            ->withAction('team')
            ->add();

        $mapper->buildRoute('/community/localization')
            ->withName('localization')
            ->withController(Community::class)
            ->withAction('localization')
            ->add();

        /* Licenses */
        $mapper->buildRoute('/licenses/:action')
            ->withName('licenses')
            ->withController(Licenses::class)
            ->defaults('action', 'index')
            ->add();

        /* Support */
        $mapper->buildRoute('/support')
            ->withName('support')
            ->withController(Support::class)
            ->withAction('index')
            ->add();

        /* Apps - main index aliases to h6 */
        $mapper->buildRoute('/apps')
            ->withName('apps')
            ->withController(App::class)
            ->withAction('index')
            ->add();

        /* Apps - Horde 5 archive */
        $mapper->buildRoute('/apps/h5')
            ->withName('apps_h5')
            ->withController(App::class)
            ->withAction('h5')
            ->add();

        $mapper->buildRoute('/apps/h5/:app/docs/:file')
            ->withName('app_h5_docs')
            ->withController(App::class)
            ->withAction('docs')
            ->add();

        $mapper->buildRoute('/apps/h5/:app')
            ->withName('app_h5')
            ->withController(App::class)
            ->withAction('app')
            ->add();

        $mapper->buildRoute('/apps/h5/:app/:action')
            ->withName('app_h5_action')
            ->withController(App::class)
            ->defaults('action', 'app')
            ->withSecondaryRoute('/apps/h5/:app/screenshots')
            ->withSecondaryRoute('/apps/h5/:app/screenshots_old')
            ->add();

        /* Apps - Horde 6 */
        $mapper->buildRoute('/apps/h6')
            ->withName('apps_h6')
            ->withController(App::class)
            ->withAction('h6')
            ->add();

        $mapper->buildRoute('/apps/h6/:app/docs/:file')
            ->withName('app_h6_docs')
            ->withController(App::class)
            ->withAction('docs')
            ->add();

        $mapper->buildRoute('/apps/h6/:app')
            ->withName('app_h6')
            ->withController(App::class)
            ->withAction('app')
            ->add();

        $mapper->buildRoute('/apps/h6/:app/:action')
            ->withName('app_h6_action')
            ->withController(App::class)
            ->defaults('action', 'app')
            ->withSecondaryRoute('/apps/h6/:app/screenshots')
            ->withSecondaryRoute('/apps/h6/:app/screenshots_old')
            ->add();

        /* Apps - individual app routes (legacy, matches after h5/h6) */
        $mapper->buildRoute('/apps/:app/docs/:file')
            ->withName('app_docs')
            ->withController(App::class)
            ->withAction('docs')
            ->add();

        $mapper->buildRoute('/apps/:app')
            ->withName('app')
            ->withController(App::class)
            ->withAction('app')
            ->add();

        $mapper->buildRoute('/apps/:app/:action')
            ->withName('app_action')
            ->withController(App::class)
            ->defaults('action', 'app')
            ->withSecondaryRoute('/apps/:app/screenshots')
            ->withSecondaryRoute('/apps/:app/screenshots_old')
            ->add();

        /* Libraries - main index aliases to h6 */
        $mapper->buildRoute('/libraries')
            ->withName('libraries')
            ->withController(Library::class)
            ->withAction('index')
            ->add();

        /* Libraries - Horde 5 archive */
        $mapper->buildRoute('/libraries/h5')
            ->withName('libraries_h5')
            ->withController(Library::class)
            ->withAction('h5')
            ->add();

        $mapper->buildRoute('/libraries/h5/:library/docs/:file')
            ->withName('library_h5_docs')
            ->withController(Library::class)
            ->withAction('docs')
            ->add();

        $mapper->buildRoute('/libraries/h5/:library')
            ->withName('library_h5')
            ->withController(Library::class)
            ->withAction('library')
            ->add();

        $mapper->buildRoute('/libraries/h5/:library/:action')
            ->withName('library_h5_action')
            ->withController(Library::class)
            ->defaults('action', 'library')
            ->add();

        /* Libraries - Horde 6 */
        $mapper->buildRoute('/libraries/h6')
            ->withName('libraries_h6')
            ->withController(Library::class)
            ->withAction('h6')
            ->add();

        $mapper->buildRoute('/libraries/h6/:library/docs/:file')
            ->withName('library_h6_docs')
            ->withController(Library::class)
            ->withAction('docs')
            ->add();

        $mapper->buildRoute('/libraries/h6/:library')
            ->withName('library_h6')
            ->withController(Library::class)
            ->withAction('library')
            ->add();

        $mapper->buildRoute('/libraries/h6/:library/:action')
            ->withName('library_h6_action')
            ->withController(Library::class)
            ->defaults('action', 'library')
            ->add();

        /* Libraries - legacy routes (match after h5/h6) */
        $mapper->buildRoute('/libraries/:library/docs/:file')
            ->withName('library_docs')
            ->withController(Library::class)
            ->withAction('docs')
            ->add();

        $mapper->buildRoute('/libraries/:library')
            ->withName('library')
            ->withController(Library::class)
            ->withAction('library')
            ->add();

        $mapper->buildRoute('/libraries/:library/:action')
            ->withName('library_action')
            ->withController(Library::class)
            ->defaults('action', 'library')
            ->add();

        /* Development */
        $mapper->buildRoute('/development/:action')
            ->withName('development')
            ->withController(Development::class)
            ->defaults('action', 'index')
            ->add();

        /* Services */
        $mapper->buildRoute('/services')
            ->withName('services')
            ->withController(Services::class)
            ->withAction('index')
            ->add();

        /* Downloads - Horde 5 archive */
        $mapper->buildRoute('/download/h5/:app')
            ->withName('download_h5')
            ->withController(Download::class)
            ->withAction('h5')
            ->add();

        /* Downloads - Horde 6 */
        $mapper->buildRoute('/download/h6/:app')
            ->withName('download_h6')
            ->withController(Download::class)
            ->withAction('h6')
            ->add();

        /* Downloads - legacy route aliases to H6 */
        $mapper->buildRoute('/download/:app')
            ->withName('download')
            ->withController(Download::class)
            ->withAction('app')
            ->add();

        /* Shop */
        $mapper->buildRoute('/shop/us')
            ->withName('shopus')
            ->withController(Shop::class)
            ->withAction('us')
            ->add();

        $mapper->buildRoute('/shop/eu')
            ->withName('shopeu')
            ->withController(Shop::class)
            ->withAction('eu')
            ->add();

        /* Diagnostics — feed/library cache round-trip probe. Gated by
         * $diag_token in config/conf.php; if the token is unset the
         * controller returns 404 so the route is indistinguishable from
         * an unknown path. */
        $mapper->buildRoute('/_diag/feed-cache')
            ->withName('diag_feed_cache')
            ->withController(Diagnostics::class)
            ->withAction('index')
            ->add();
    },
);
