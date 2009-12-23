<?php 
require '../config/defaults.php';
include 'lists.php';
$toolbar_mode = 'support_mail';
$subsite_title = 'Horde Mailing Lists';
$content_file = './mail.html';
require $fs_base . '/templates/horde.inc';
