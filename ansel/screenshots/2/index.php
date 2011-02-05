<?php
include '../../../config/defaults.php';
$toolbar_mode  = 'ansel';
$subsite_title = 'Ansel Screenshots';
$content_file  = './screenshots.html';
include $fs_base . '/templates/horde.inc';

function ssLink($fileroot)
{
    $s = "<a href=\"${fileroot}.jpg\"><img border=\"0\" ";
    $s .= "src=\"${fileroot}-thumb.jpg\" alt=\"${fileroot}\" /></a>";

    return $s;
}
