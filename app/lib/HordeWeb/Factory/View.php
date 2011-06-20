<?php
/**
 * HordeWeb_Binder_View:: binder for configured view object for this site.
 *
 * Copyright 2011 Horde LLC (http://www.horde.org)
 *
 * @author mrubinsk
 */
class HordeWeb_Factory_View extends Horde_Core_Factory_Injector
{
    public function create(Horde_Injector $injector)
    {
        // Set up a view with the shared template path.
        // Individual controlles will set the specific path for their view.
        // @TODO: GLOBALS should be moved to a site_config object obtained via
        // the injector and injected into each class that needs them.
        $view = $injector->getInstance('Horde_View');
        $view->addHelper('Tag');
        $view->addHelper('Url');

        $view->addTemplatePath(
            array($GLOBALS['fs_base'] . '/app/views/shared',
                  $GLOBALS['fs_base'] . '/app/views/partials',
                  $GLOBALS['fs_base'] . '/app/views/layout')
        );

        return $view;
    }

}
