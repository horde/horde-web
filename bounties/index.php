<?php
include '../config/defaults.php';
include 'bounties.php';
include 'sponsors.php';
include dirname(__FILE__) . '/../templates/functions.inc';
include dirname(__FILE__) . '/../libs/Util.php';
$tickets = getFeeds(array('http://bugs.horde.org/query/enhancements/rss'));
$toolbar_mode = 'bounties';
$content_file = './bounties.html';
$subsite_title = 'Horde Bounties';
include $fs_base . '/templates/horde.inc';
