<?php

/**
 * The Horde_Cache_file:: class provides a filesystem implementation of the
 * Horde caching system.
 *
 * Optional parameters:<pre>
 *   'dir'     The base directory to store the cache files in.
 *   'prefix'  The filename prefix to use for the cache files.
 *   'sub'     An integer. If non-zero, the number of subdirectories to
 *             create to store the file (i.e. PHP's session.save_path).</pre>
 *
 * Copyright 1999-2009 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Anil Madhavapeddy <anil@recoil.org>
 * @author  Chuck Hagenbuch <chuck@horde.org>
 * @since   Horde 1.3
 * @package Horde_Cache
 */
class Horde_Cache_file {

    /**
     * The filename prefix for cache files.
     *
     * @var string
     */
    var $_prefix = 'cache_';

    /**
     * Attempts to retrieve cached data from the filesystem and return it to
     * the caller.
     *
     * @param string  $key       Cache key to fetch.
     * @param integer $lifetime  Lifetime of the data in seconds.
     *
     * @return mixed  Cached data, or false if none was found.
     */
    function get($key, $lifetime = 1)
    {
        if ($this->exists($key, $lifetime)) {
            $filename = $this->_keyToFile($key);
            $size = filesize($filename);
            if (!$size) {
                return '';
            }
            $data = file_get_contents($filename);
            if ($data !== false) {
                return $data;
            }
        }

        /* Nothing cached, return failure. */
        return false;
    }

    /**
     * Attempts to store data to the filesystem.
     *
     * @param string $key   Cache key.
     * @param mixed  $data  Data to store in the cache.
     *
     * @return boolean  True on success, false on failure.
     */
    function set($key, $data)
    {
        // Added for hordeweb
        require_once $GLOBALS['fs_base'] . '/libs/Util.php';

        $filename = $this->_keyToFile($key, true);
        $tmp_file = Util::getTempFile('HordeCache');

        if ($fd = fopen($tmp_file, 'w')) {
            if (fwrite($fd, $data) < strlen($data)) {
                fclose($fd);
                return false;
            } else {
                fclose($fd);
                @rename($tmp_file, $filename);
            }
        }
    }

    /**
     * Attempts to directly output cached data from the filesystem.
     *
     * @param string  $key       Cache key to output.
     * @param integer $lifetime  Lifetime of the data in seconds.
     *
     * @return mixed  Cached data, or false if none was found.
     */
    function output($key, $lifetime = 1)
    {
        if ($this->exists($key, $lifetime)) {
            $filename = $this->_keyToFile($key);
            $fd = @fopen($filename, 'r');
            if ($fd) {
                fpassthru($fd);
                return true;
            }
        }

        /* Nothing cached, return failure. */
        return false;
    }

    /**
     * Checks if a given key exists in the cache, valid for the given
     * lifetime. If it exists but is expired, delete the file.
     *
     * @param string  $key       Cache key to check.
     * @param integer $lifetime  Lifetime of the key in seconds.
     *
     * @return boolean  Existance.
     */
    function exists($key, $lifetime = 1)
    {
        $filename = $this->_keyToFile($key);

        /* Key exists in the cache */
        if (file_exists($filename)) {
            /* 0 means no expire. */
            if ($lifetime == 0) {
                return true;
            }

            /* If the file was been created after the supplied value,
             * the data is valid (fresh). */
            if (time() - $lifetime <= filemtime($filename)) {
                return true;
            } else {
                @unlink($filename);
            }
        }

        return false;
    }

    /**
     * Map a cache key to a unique filename.
     *
     * @access private
     *
     * @param string $key     Cache key.
     * @param string $create  Create path if it doesn't exist?
     *
     * @return string  Fully qualified filename.
     */
    function _keyToFile($key, $create = false)
    {
        return '/tmp/' . $this->_prefix . md5($key);
    }

}
