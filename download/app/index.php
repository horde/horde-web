<?php
include '../../config/defaults.php';
include '../../config/versions.php';
require_once '../../templates/functions.inc';

$app = trim($_GET['app']);
if (empty($app)) {
    exit;
}

$app_info = $stableapp = $stabledate = $devapp = $deprapp = $app_list = array();
if ($app != 'groupware' && $app != 'webmail') {
    $app_list[] = 'horde';
}
if (in_array($app, array('dimp', 'mimp'))) {
    $app_list[] = 'imp';
}
$app_list[] = $app;
$app_list = array_unique($app_list);

if (isset($horde_apps_stable[$app])) {
    foreach ($app_list as $val) {
        $stableapp[] = app_download_link($val, $horde_apps_stable[$val]);
        $stabledate[$val] = strtotime($horde_apps_stable[$val]['date']);
    }
    $app_info = $horde_apps_stable[$app];

    $stableapp[] = '<a href="' . htmlspecialchars(app_patches_url($val, $horde_apps_stable[$app])) . '">Patches for Current Stable Release</a>';
} else {
    $stableapp[] = 'No current stable release';
}

if (isset($horde_apps_dev[$app]) &&
    ($stabledate[$app] < strtotime($horde_apps_dev[$val]['date']))) {
    foreach ($app_list as $val) {
        if ((($val == 'horde') && !isset($horde_apps_dev[$val])) ||
            (isset($horde_apps_dev[$val]) && ($stabledate[$val] > strtotime($horde_apps_dev[$val]['date'])))) {
            $devapp[] = app_download_link($val, $horde_apps_stable[$val]);
        } else {
            $devapp[] = app_download_link($val, $horde_apps_dev[$val]);
        }
    }
    if (empty($app_info)) {
        $app_info = $horde_apps_dev[$app];
    }
} else {
    $devapp[] = 'No current development release';
}

if (isset($horde_apps_deprecated[$app])) {
    foreach ($app_list as $val) {
        $deprapp[] = app_download_link($val, $horde_apps_deprecated[$val]);
    }
    if (empty($app_info)) {
        $app_info = $horde_apps_deprecated[$app];
    }
}

if (empty($app_info)) {
    $app_info['name'] = ucfirst($app);
}

$toolbar_mode  = $app;
$subsite_title = htmlspecialchars($app_info['name']) . ' Download';
$content_file  = './download.html';
include $fs_base . '/templates/horde.inc';
