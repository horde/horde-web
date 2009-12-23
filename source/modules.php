<?php 

function cvs_and_ver($module)
{
    global $horde_apps_stable, $horde_apps_dev;
    return '<td><a href="http://cvs.horde.org/' . htmlspecialchars($module) . '/">' . htmlspecialchars($module) . '</a>'
        . '</td><td>' . (isset($horde_apps_stable[$module]) ? htmlspecialchars($horde_apps_stable[$module]['ver']) : (isset($horde_apps_dev[$module]) ? htmlspecialchars($horde_apps_dev[$module]['ver']) : '&nbsp;'))
        . '</td>';
}

require '../config/defaults.php';
require '../config/versions.php';
$toolbar_mode = 'source_modules';
$content_file = './modules.html';
$subsite_title = 'Horde CVS Modules';
require $fs_base . '/templates/horde.inc';
