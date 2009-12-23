<?php
require '../../config/defaults.php';
$toolbar_mode  = 'forwards';
$subsite_title = 'Forwards Documentation';
$content_file  = empty($_GET['f']) ? './docs.html' : './' . basename($_GET['f']);
if ($content_file == './CREDITS.html') {
    $page_charset = 'utf-8';
}
require $fs_base . '/templates/horde.inc';
