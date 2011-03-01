<?php 
require '../config/defaults.php';
$toolbar_mode = (@$_GET['mode'] == 'dev' ? 'development' : 'documentation') . '_library';
$content_file  = './papers.html';
$subsite_title = 'Horde Library';
require $fs_base . '/templates/horde.inc';
