<?php
switch ($_REQUEST['file']) {
case 'browse':
    highlight_file(dirname(__FILE__) . '/sample_browse.php.txt');
    break;

case 'lens':
    highlight_file(dirname(__FILE__) . '/sample_lens.php.txt');
    break;

case 'weather':
    highlight_file(dirname(__FILE__) . '/sample_weather.php.txt');
    break;
}
