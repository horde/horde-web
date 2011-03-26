<?php 
/** Thumbnails: convert -size 200x150 -resize 200x150 -quality 80 $FILE.png $FILE-thumb.jpg */

include '../../config/defaults.php';
$toolbar_mode  = 'imp';
$subsite_title = 'IMP Screenshots';
$content_file  = './screenshots.html';
include $fs_base . '/templates/horde.inc';

function sslink($version, $fileroot, $caption = '')
{
    $s = "<a href=\"${version}/${fileroot}.png\"><img border=\"0\" ";
    $s .= "src=\"${version}/${fileroot}-thumb.jpg\" alt=\"${fileroot}\" /></a>";
    if ($caption) {
        $s .= "<br />\n$caption";
    }

    return $s;
}
