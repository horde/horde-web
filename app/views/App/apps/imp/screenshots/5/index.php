<?php
include '../../../config/defaults.php';
$toolbar_mode  = 'imp';
$subsite_title = 'IMP 5 Screenshots';
$content_file  = './screenshots.html';
include $fs_base . '/templates/horde.inc';

function ssLink($fileroot)
{
    $s = "<a href=\"${fileroot}.png\"><img border=\"0\" ";
    $s .= "src=\"${fileroot}-thumb.png\" alt=\"${fileroot}\" /></a>";

    return $s;
}
