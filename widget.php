<?php
//http://web.horde.org/widget/sidebarJS?url=http://horde.org
echo @file_get_contents('http://web.horde.org/widget/sidebarJS?url=' . @$_GET['url'] . '&refererUrl=' . @$_SERVER['HTTP_REFERRER']);
?>
