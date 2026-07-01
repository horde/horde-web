<?php
/**
 * HordeWeb application initialization
 *
 * Copyright 2011-2026 Horde LLC (http://www.horde.org)
 */

require_once dirname(__FILE__) . '/../../config/conf.php';

// config/conf.php declares $host_base, $fs_base, $site_name, $feed_url,
// $planet_feed_url and $feed_timeout at file scope. When base.php is
// loaded from a function (e.g. the LegacyBootstrap middleware under
// rampage) those become function locals; the legacy code and views
// throughout hordeweb read them off $GLOBALS. Promote them here so
// both entry points expose the same globals.
foreach (['host_base', 'fs_base', 'site_name', 'feed_url', 'planet_feed_url', 'feed_timeout', 'diag_token'] as $__hwvar) {
    if (isset($$__hwvar)) {
        $GLOBALS[$__hwvar] = $$__hwvar;
    }
}
unset($__hwvar);

require_once HORDE_BASE . '/lib/core.php';
$session_control = 'none';
$nocompress = true;
Horde_Registry::appInit('horde', array('authentication' => 'none', 'nocompress' => $nocompress, 'session_control' => $session_control));

// The injector's Horde_Autoloader binding is not always the SPL-registered
// instance under rampage: composer's autoloader chain preloads
// Horde_Autoloader_Default.php, which self-registers a fresh instance
// on SPL before the injector binding is made. Locate the actual SPL
// instance and add our class-path mappers there.
$autoloader = null;
foreach (spl_autoload_functions() ?: [] as $fn) {
    if (is_array($fn) && is_object($fn[0]) && $fn[0] instanceof Horde_Autoloader) {
        $autoloader = $fn[0];
        break;
    }
}
if ($autoloader === null) {
    $autoloader = $GLOBALS['injector']->getInstance('Horde_Autoloader');
}
$autoloader->addClassPathMapper(new Horde_Autoloader_ClassPathMapper_Default($fs_base . '/app/lib/'));
$applicationMapper = new Horde_Autoloader_ClassPathMapper_Application($fs_base .  '/app');
$applicationMapper->addMapping('Controller', 'controllers');
$applicationMapper->addMapping('SettingsExporter', 'settings');
$autoloader->addClassPathMapper($applicationMapper);

$myMapper = new Horde_Autoloader_ClassPathMapper_Prefix('/^HordeWeb_/', $fs_base . '/app/lib/HordeWeb');
$autoloader->addClassPathMapper($myMapper);

// PSR-4 autoloader for modern controllers (HordeWeb\Controller\*)
$psr4Mapper = new Horde_Autoloader_ClassPathMapper_Prefix('/^HordeWeb\\\\/', $fs_base . '/srv/HordeWeb');
$autoloader->addClassPathMapper($psr4Mapper);

/* Binders */
$GLOBALS['injector']->bindFactory('HordeWeb_View', 'HordeWeb_Factory_View', 'create');

// Note: Mapper and routes are created/loaded in dispatch.php
