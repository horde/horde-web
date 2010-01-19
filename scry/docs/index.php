<?php
require '../../config/defaults.php';
$toolbar_mode  = 'scry';
$subsite_title = 'Scry Documentation';
$content_file  = empty($_GET['f']) ? './docs.html' : './' . basename($_GET['f']);
$page_charset = 'utf-8';
require $fs_base . '/templates/horde.inc';

