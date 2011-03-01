<?php
switch ($_REQUEST['file']) {
case 'browse':
    highlight_file(dirname(__FILE__) . '/sample_browse.php.txt');
    break;
}
