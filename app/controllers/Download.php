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
        $view->hasAdditional = file_exists($GLOBALS['fs_base'] . '/app/views/Download/apps/' . $this->_matchDict->app . '/additional.html.php');
        $view->addTemplatePath(
            array(
                $GLOBALS['fs_base'] . '/app/views/Download',
                $GLOBALS['fs_base'] . '/app/views/Download/apps/' . $this->_matchDict->app));
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

        $app_info = $h3app = $h4date = $stableapp = $stabledate = $devapp = $app_list = array();
        if ($app != 'groupware' && $app != 'webmail') {
            $app_list[] = 'horde';
        }
        if (in_array($app, array('dimp', 'mimp'))) {
            $app_list[] = 'imp';
        }
        $app_list[] = $app;
        $app_list = array_unique($app_list);

        foreach ($app_list as $val) {
            $stable = HordeWeb_Utils::getStableApps($val);
            $h4 = HordeWeb_Utils::getH4Apps($val);
            $stabledate[$val] = $stable ? strtotime($stable['date']) : 0;
            $h4date[$val] = $h4 ? strtotime($h4['date']) : 0;
        }

        $stable = HordeWeb_Utils::getStableApps($app);
        if ($stable) {
            foreach ($app_list as $val) {
                $stableapp[] = HordeWeb_Utils::app_download_link($val, HordeWeb_Utils::getStableApps($val), false, $this);
            }
            $app_info = $stable;
            $stableapp[] = '<a href="' . htmlspecialchars(HordeWeb_Utils::app_patches_url($val, $stable)) . '">Patches for Current Stable Release</a>';
        } else {
            $stableapp[] = 'No current stable release';
        }

        $h3 = HordeWeb_Utils::getH3Apps($app);
        if ($h3) {
            foreach ($app_list as $val) {
                $h3app[] = HordeWeb_Utils::app_download_link($val, HordeWeb_Utils::getH3Apps($val), false, $this);
            }
            $h3app[] = '<a href="' . htmlspecialchars(HordeWeb_Utils::app_patches_url($val, $h3)) . '">Patches for Deprecated Horde 3 Stable Release</a>';
        }

        $dev = HordeWeb_Utils::getDevApps($app);
        if ($dev &&
            $stabledate[$app] < strtotime($dev['date']) &&
            $h4date[$app] < strtotime($dev['date'])) {
            foreach ($app_list as $val) {
                $info = HordeWeb_Utils::getDevApps($val);
                if (!$info) {
                    $devapp[] = HordeWeb_Utils::app_download_link($val, HordeWeb_Utils::getStableApps($val));
                } elseif ($h4date[$val] > strtotime($dev['date'])) {
                    $devapp[] = HordeWeb_Utils::app_download_link($val, HordeWeb_Utils::getH4Apps($val));
                } elseif ($stabledate[$val] > strtotime($dev['date'])) {
                    $devapp[] = HordeWeb_Utils::app_download_link($val, HordeWeb_Utils::getStableApps($val));
                } else {
                    $devapp[] = HordeWeb_Utils::app_download_link($val, HordeWeb_Utils::getDevApps($val));
                }
            }
            if (empty($app_info)) {
                $app_info = $dev;
            }
        }

        if (empty($app_info)) {
            $app_info['name'] = ucfirst($app);
        }

        $view->h3app = $h3app;
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
