<?php 
include '../../config/defaults.php';
$toolbar_mode  = 'kronolith';
$subsite_title = 'Kronolith Screenshots';
$content_file  = './screenshots.html';
include $fs_base . '/templates/horde.inc';

function ssLink($fileroot)
{
    $s = "<a href=\"${fileroot}.png\"><img border=\"0\" ";
    $s .= "src=\"${fileroot}-thumb.jpg\" alt=\"${fileroot}\" /></a>";

    return $s;
}
