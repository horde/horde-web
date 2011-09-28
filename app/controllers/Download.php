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
        case 'app':
            $this->_app($response);
            break;
        default:
            $this->_notFound($response);

        }
    }

    protected function _setup()
    {
        parent::_setup();
        $view = $this->getView();
        $view->addTemplatePath(
            array($GLOBALS['fs_base'] . '/app/views/Download'));
        $view->stable = HordeWeb_Utils::getH3Apps();
        $view->h4Stable = HordeWeb_Utils::getH4Apps();
    }

    /**
     *
     * @param Horde_Controller_Response $response
     */
    protected function _index(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $view->page_title = 'Downloads - The Horde Project';
        $view->appListController = array('controller' => 'download', 'action' => 'app');
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render('index'));
    }

    protected function _app(Horde_Controller_Response $response)
    {
        $app = $this->_matchDict->app;
        if (empty($app)) {
            exit;
        }

        $view = $this->getView();
        $view->page_title = 'Downloads - The Horde Project';
        $view->appListController = array('controller' => 'download', 'action' => 'app');
        $view->appname = $app;

        $horde_apps_stable = $view->stable;
        $horde_apps_h4     = $view->h4Stable;
        $horde_apps_dev    = HordeWeb_Utils::getDevApps();

        $app_info = $h4app = $h4date = $stableapp = $stabledate = $devapp = $app_list = array();
        if ($app != 'groupware' && $app != 'webmail') {
            $app_list[] = 'horde';
        }
        if (in_array($app, array('dimp', 'mimp'))) {
            $app_list[] = 'imp';
        }
        $app_list[] = $app;
        $app_list = array_unique($app_list);

        foreach ($app_list as $val) {
            $stabledate[$val] = isset($horde_apps_stable[$val])
                ? strtotime($horde_apps_stable[$val]['date'])
                : 0;
            $h4date[$val] = isset($horde_apps_h4[$val])
                ? strtotime($horde_apps_h4[$val]['date'])
                : 0;
        }

        if (isset($horde_apps_stable[$app])) {
            foreach ($app_list as $val) {
                $stableapp[] = HordeWeb_Utils::app_download_link($val, $horde_apps_stable[$val], false, $this);
            }
            $app_info = $horde_apps_stable[$app];
            $stableapp[] = '<a href="' . htmlspecialchars(HordeWeb_Utils::app_patches_url($val, $horde_apps_stable[$app])) . '">Patches for Current Stable Release</a>';
        } else {
            $stableapp[] = 'No current stable release';
        }

        if (isset($horde_apps_h4[$app])) {
            foreach ($app_list as $val) {
                $h4app[] = HordeWeb_Utils::app_download_link($val, $horde_apps_h4[$val], false, $this);
            }
        }

        if (isset($horde_apps_dev[$app]) &&
            $stabledate[$app] < strtotime($horde_apps_dev[$val]['date']) &&
            $h4date[$app] < strtotime($horde_apps_dev[$val]['date'])) {
            foreach ($app_list as $val) {
                if (!isset($horde_apps_dev[$val])) {
                    $devapp[] = HordeWeb_Utils::app_download_link($val, $horde_apps_stable[$val]);
                } elseif ($h4date[$val] > strtotime($horde_apps_dev[$val]['date'])) {
                    $devapp[] = HordeWeb_Utils::app_download_link($val, $horde_apps_h4[$val]);
                } elseif ($stabledate[$val] > strtotime($horde_apps_dev[$val]['date'])) {
                    $devapp[] = HordeWeb_Utils::app_download_link($val, $horde_apps_stable[$val]);
                } else {
                    $devapp[] = HordeWeb_Utils::app_download_link($val, $horde_apps_dev[$val]);
                }
            }
            if (empty($app_info)) {
                $app_info = $horde_apps_dev[$app];
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

        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render('app'));
    }

}
