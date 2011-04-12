<?php
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


/* Binders */
$GLOBALS['injector']->addBinder('HordeWeb_View', new HordeWeb_Binder_View());
$registry = $GLOBALS['injector']->getInstance('Horde_Registry');

/* Add our config to the injector */
//`$GLOBALS['injector']->setInstance('site_config', $config);
