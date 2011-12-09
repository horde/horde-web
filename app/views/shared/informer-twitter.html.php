<?php
/* Informer twitter widget. */
$cache = $GLOBALS['injector']->getInstance('Horde_Cache');
if (!($widget = $cache->get('informertwitter', 600))) {
    $widget = @file_get_contents('http://67.228.51.211/twidgethor.php');
    $cache->set('informertwitter', $widget);
}
echo $widget;
