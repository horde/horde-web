<?php
/**
 * Utility functions
 *
 */
class HordeWeb_Utils
{
    /**
     * Get a random "we are awesome" quote.
     *
     */
    static public function getQuote()
    {
        include $GLOBALS['fs_base'] . '/config/quotes.php';
        return $quotes[rand(0, count($quotes) - 1)];
    }

    /**
     * @TODO eventually use a db and some command line tools
     * @return array
     */
    static public function getStableApps()
    {
        require $GLOBALS['fs_base'] . '/config/versions.php';
        return $horde_apps_stable;
    }

    static public function getDevApps()
    {
        return $GLOBALS['horde_apps_dev'];
    }

    static public function app_download_link($key, $elt, $graphic = false)
    {
        $text = $elt['name'] . ' ' . $elt['ver'];
        if ($graphic) {
            $text = '<img class="download" src="' . $GLOBALS['host_base'] . '/images/download.png" alt="' . $text . '" />';
        }

        return '<a href="' . self::app_download_url($key, $elt) . '">' . $text . '</a> (' . $elt['date'] . ')';
    }

    static public function app_download_url($key, $elt)
    {
        $dir = isset($elt['dir']) ? $elt['dir'] : $key;
        return 'ftp://ftp.horde.org/pub/' .
            rtrim($dir, ' /') .
            '/' .
            (isset($elt['file']) ? $elt['file'] : $dir . '-latest.tar.gz');
    }

    static public function app_patches_url($key, $elt)
    {
        return 'ftp://ftp.horde.org/pub/' .
            '/' .
            rtrim(isset($elt['dir']) ? $elt['dir'] : $key, ' /') .
            '/patches/';
    }


    /**
     * Generate a linked thumbnail for screenshots.
     *
     * @param string $app        The application the screenshot is for
     * @param string $imagename  The image name
     * @param boolean $png       Full size screenshot is in PNG format.
     * @return type
     */
    static public function ssLink($app, $imagename, $png = false, $text = '')
    {
        $full = $GLOBALS['host_base'] . '/images/screenshots/' . $app . '/' . $imagename . ($png ? '.png' : '.jpg');
        $thumb = $GLOBALS['host_base'] . '/images/screenshots/' . $app . '/' . $imagename . '-thumb.jpg';
        $s = "<a href=\"$full\"><img border=\"0\" ";
        $s .= "src=\"$thumb\" alt=\"$imagename\" /></a>";

        if (!empty($text)) {
            $s .= '<br />' . $text;
        }

        return $s;
    }

    static public function breadcrumbs($controller, $params = array())
    {
        $view = $controller->getView();
        switch (get_class($controller)) {
        case 'HordeWeb_App_Controller':
            $crumb = $view->linkToUnlessCurrent('Community', array('controller' => 'community'))
                . '::'
                . $view->linkToUnlessCurrent('Applications', array('controller' => 'app'));

                if (!empty($view->appname)) {
                    $crumb .= '::';
                }
                $crumb .= $view->linkToUnless(empty($view->appname) || !$view->isCurrentPage(array('controller' => 'app')), ucfirst($view->appname), array('controller' => 'app', 'action' => 'app'));
        }

        return $crumb;
    }
}