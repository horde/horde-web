<?php
/**
 * HordeWeb application initialization
 *
 * Copyright 2011-2026 Horde LLC (http://www.horde.org)
 */

use Horde\Routes\Mapper;

require_once dirname(__FILE__) . '/../../config/horde.local.php';
require_once HORDE_CONFIG_BASE . '/hordeweb/conf.php';
require_once HORDE_BASE . '/lib/core.php';
$session_control = 'none';
$nocompress = true;
Horde_Registry::appInit('horde', array('authentication' => 'none', 'nocompress' => $nocompress, 'session_control' => $session_control));
$GLOBALS['injector']->getInstance('Horde_Autoloader')->addClassPathMapper(new Horde_Autoloader_ClassPathMapper_Default($fs_base . '/app/lib/'));
$applicationMapper = new Horde_Autoloader_ClassPathMapper_Application($fs_base .  '/app');
$applicationMapper->addMapping('Controller', 'controllers');
$applicationMapper->addMapping('SettingsExporter', 'settings');
$__autoloader->addClassPathMapper($applicationMapper);

$myMapper = new Horde_Autoloader_ClassPathMapper_Prefix('/^HordeWeb_/', $fs_base . '/app/lib/HordeWeb');
$__autoloader->addClassPathMapper($myMapper);

/* Binders */
$GLOBALS['injector']->bindFactory('HordeWeb_View', 'HordeWeb_Factory_View', 'create');
$registry = $GLOBALS['injector']->getInstance('Horde_Registry');
$mapper = $GLOBALS['injector']->getInstance(Mapper::class);
require_once dirname(__FILE__) . '/../../config/routes.php';
