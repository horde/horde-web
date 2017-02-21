<?php
/* Informer widget. */
$cache = $GLOBALS['injector']->getInstance('Horde_Cache');
//if (!($widget = $cache->get('informer', 600))) {
    $widget = @file_get_contents('http://website.informer.com/widget/webhorde-relaunch-sidebar');
    $cache->set('informer', $widget);
//}
echo $widget;
?>
