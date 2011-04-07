<?php
/**
 * Download controller class
 *
 * Handles requests to the download page.
 *
 * Copyright 2011 Horde LLC (http://www.horde.org)
 *
 * @license  http://opensource.org/licenses/bsd-license.php BSD
 * @author Michael J Rubinsky <mrubinsk@horde.org>
 */
class HordeWeb_Download_Controller extends HordeWeb_Controller_Base
{
    /**
     *
     *
     * @param Horde_Controller_Response $response
     */
    protected function _processRequest(Horde_Controller_Response $response)
    {
        switch ($this->_matchDict->action) {
        case 'index':
            $this->_index($response);
            break;
        case 'app':
            $this->_app($response);
            break;
        }
    }

    protected function _setup()
    {
        parent::_setup();
        $view = $this->getView();
        $view->addTemplatePath(
            array($GLOBALS['fs_base'] . '/app/views/Download'));
        $view->stable = HordeWeb_Utils::getStableApps();
        $view->h4Stable = HordeWeb_Utils::getH4Apps();
    }

    /**
     *
     * @param Horde_Controller_Response $response
     */
    protected function _index(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $view->page_title = 'The Horde Project::Downloads';
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render('index'));
    }

    protected function _app(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $view->page_title = 'The Horde Project::Downloads';
        $horde_apps_stable = $view->stable;
        $horde_apps_dev = HordeWeb_Utils::getDevApps();
        $app = $this->_matchDict->app;
        if (empty($app)) {
            exit;
        }
        $view->appname = $app;
        $app_info = $h4app = $h4date = $stableapp = $stabledate = $devapp = $deprapp = $app_list = array();
        if ($app != 'groupware' && $app != 'webmail') {
            $app_list[] = 'horde';
        }
        if (in_array($app, array('dimp', 'mimp'))) {
            $app_list[] = 'imp';
        }
        $app_list[] = $app;
        $app_list = array_unique($app_list);

        if (isset($horde_apps_stable[$app])) {
            foreach ($app_list as $val) {
                $stableapp[] = HordeWeb_Utils::app_download_link($val, $horde_apps_stable[$val]);
                $stabledate[$val] = strtotime($horde_apps_stable[$val]['date']);
            }
            $app_info = $horde_apps_stable[$app];
            $stableapp[] = '<a href="' . htmlspecialchars(HordeWeb_Utils::app_patches_url($val, $horde_apps_stable[$app])) . '">Patches for Current Stable Release</a>';
        } else {
            $stableapp[] = 'No current stable release';
        }

        $h4apps = $view->h4Stable;
        if (!empty($h4apps[$app])) {
            foreach ($app_list as $val) {
                $h4app[] = HordeWeb_Utils::app_download_link($val, $h4apps[$val], false, $this);
                $h4date[$val] = strtotime($h4apps[$val]['date']);
            }
        }

        if (isset($horde_apps_dev[$app]) &&
            ($stabledate[$app] < strtotime($horde_apps_dev[$val]['date']))) {
            foreach ($app_list as $val) {
                if ((($val == 'horde') && !isset($horde_apps_dev[$val])) ||
                    (isset($horde_apps_dev[$val]) && ($stabledate[$val] > strtotime($horde_apps_dev[$val]['date'])))) {
                    $devapp[] = HordeWeb_Utils::app_download_link($val, $horde_apps_stable[$val]);
                } else {
                    $devapp[] = HordeWeb_Utils::app_download_link($val, $horde_apps_dev[$val]);
                }
            }
            if (empty($app_info)) {
                $app_info = $horde_apps_dev[$app];
            }
        } else {
            $devapp[] = 'No current development release';
        }

        if (isset($horde_apps_deprecated[$app])) {
            foreach ($app_list as $val) {
                $deprapp[] = HordeWeb_Utils::app_download_link($val, $horde_apps_deprecated[$val]);
            }
            if (empty($app_info)) {
                $app_info = $horde_apps_deprecated[$app];
            }
        }

        if (empty($app_info)) {
            $app_info['name'] = ucfirst($app);
        }

        $view->h4app = $h4app;
        $view->stableapp = $stableapp;
        $view->stabledate = $stabledate;
        $view->devapp = $devapp;
        $view->app_info = $app_info;
        $view->deprapp = $deprapp;

        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render('app'));
    }

}
