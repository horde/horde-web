<?php 
/** Thumbnails: convert -size 200x150 -resize 200x150 -quality 80 $FILE.png $FILE-thumb.png */

include '../../config/defaults.php';
$toolbar_mode  = 'hermes';
$subsite_title = 'Hermes Screenshots';
$content_file  = './screenshots.html';
include $fs_base . '/templates/horde.inc';

function sslink($fileroot, $caption = '')
{
    $s = "<a href=\"${fileroot}.png\"><img border=\"0\" ";
    $s .= "src=\"${fileroot}-thumb.png\" alt=\"${fileroot}\" /></a>";
    if ($caption) {
        $s .= "<br />\n$caption";
    }

    return $s;
}
