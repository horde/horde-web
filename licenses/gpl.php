<?php 
include '../config/defaults.php';
$toolbar_mode = '';
$lines = file('./COPYING');
$content_text  = '<i>Original:</i> <a href="http://www.fsf.org/copyleft/gpl.html">http://www.fsf.org/copyleft/gpl.html</a><br /><pre>';
$content_text .= htmlentities(implode('', $lines));
$content_text .= '</pre>';
$subsite_title = 'GPL';
include $fs_base . '/templates/horde.inc';
?>
