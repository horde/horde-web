<?php 
include '../config/defaults.php';
$toolbar_mode = '';
$lines = file('./LICENSE');
$content_text  = '<i>Original:</i> <a href="http://www.opensource.org/licenses/apachepl.html">http://www.opensource.org/licenses/apachepl.html</a><br /><pre>';
$content_text .= htmlentities(implode('', $lines));
$content_text .= '</pre>';
$subsite_title = 'Horde Apache-like License';
include $fs_base . '/templates/horde.inc';
?>
