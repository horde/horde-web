<?php 
include '../config/defaults.php';
$toolbar_mode = '';
$lines = file('./COPYRIGHT');
$content_text  = '<i>Original:</i> <a href="http://www.opensource.org/licenses/bsd-license.html">http://www.opensource.org/licenses/bsd-license.html</a><br /><pre>';
$content_text .= htmlentities(implode('', $lines));
$content_text .= '</pre>';
$subsite_title = 'Horde BSD-like License';
include $fs_base . '/templates/horde.inc';
?>
