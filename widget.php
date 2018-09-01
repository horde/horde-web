<?php
//http://web.horde.org/widget/sidebarJS?url=https://horde.org
header('Content-Type: application/javascript; charset=utf-8');
echo @file_get_contents('http://web.horde.org/widget/sidebarJS?url=' . @$_GET['url'] . '&refererUrl=' . @$_GET['refererUrl']);
