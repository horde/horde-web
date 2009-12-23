<?php
include '../config/defaults.php';
include 'bounties.php';
include $fs_base . '/libs/Util.php';
$toolbar_mode = 'bounties';
$content_file = './sponsor_sent.html';
$sponsor  = Util::getFormData('sponsor');

$subsite_title = 'Thank You for Sponsoring';
include $fs_base . '/templates/horde.inc';
