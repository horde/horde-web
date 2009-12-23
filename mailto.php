<?php

$user = substr($_SERVER['PATH_INFO'], 1);
if (!strstr($user, '@')) {
    $user .= '@horde.org';
}
header("Location: mailto:$user");
exit(0);
