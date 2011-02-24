<?php
/* Informer widget. */
    $cache = $GLOBALS['injector']->getInstance('Horde_Cache');
    if (!($widget = $cache->get('informer', 600))) {
        $widget = @file_get_contents('http://web.informer.com/w/hordewidget.php');
        $cache->set('informer', $widget);
    }
    echo $widget;
?>
