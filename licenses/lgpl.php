<?php 
include '../config/defaults.php';
$toolbar_mode = '';
$lines = file('./LGPL');
$content_text  = '<i>Original:</i> <a href="http://www.fsf.org/copyleft/lgpl.html">http://www.fsf.org/copyleft/lgpl.html</a><br /><pre>';
$content_text .= htmlentities(implode('', $lines));
$content_text .= '</pre>';
$subsite_title = 'LGPL';
include $fs_base . '/templates/horde.inc';
?>
