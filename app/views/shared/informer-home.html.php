<?php
/* Informer widget. */
    $cache = $GLOBALS['injector']->getInstance('Horde_Cache');
    if (!($widget = $cache->get('informerhome', 600))) {
        $widget = @file_get_contents('http://website.informer.com/w/hordewidget3.php');
        $cache->set('informerhome', $widget);
    }
    echo $widget;
?>
