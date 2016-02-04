<?php
/* Informer twitter widget. */
$cache = $GLOBALS['injector']->getInstance('Horde_Cache');
if (!($widget = $cache->get('informertwitter', 600))) {
    $widget = @file_get_contents('http://whois.stsoftware.biz/twidgethor.php');
    $cache->set('informertwitter', $widget);
}
echo $widget;
