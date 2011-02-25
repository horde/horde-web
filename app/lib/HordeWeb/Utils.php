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

}