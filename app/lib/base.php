<?php
/**
 * HordeWeb application initialization
 *
 * Copyright 2011-2026 Horde LLC (http://www.horde.org)
 */

require_once dirname(__FILE__) . '/../../config/conf.php';
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

// PSR-4 autoloader for modern controllers (HordeWeb\Controller\*)
$psr4Mapper = new Horde_Autoloader_ClassPathMapper_Prefix('/^HordeWeb\\\\/', $fs_base . '/srv/HordeWeb');
$__autoloader->addClassPathMapper($psr4Mapper);

/* Binders */
$GLOBALS['injector']->bindFactory('HordeWeb_View', 'HordeWeb_Factory_View', 'create');

// Note: Mapper and routes are created/loaded in dispatch.php
