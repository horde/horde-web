<?php
require '../config/defaults.php';
$toolbar_mode = 'logos';
$subsite_title = 'Horde Logos';
$content_file = './logos.html';
require $fs_base . '/templates/horde.inc';

function logo($img)
{
    global $base_url;
    echo '<img src="' . $base_url . '/graphics/logos/' . $img . '" alt="' . $img . '" />';
}
