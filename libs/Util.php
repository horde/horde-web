<?php
/**
 * The Util:: class provides generally useful methods of different kinds.
 *
 * Note: This is a slightly modified, stripped down version of this class
 * specifically designed for hordeweb.
 *
 * $Horde: hordeweb/libs/Util.php,v 1.3 2009/01/06 17:50:12 jan Exp $
 *
 * Copyright 1999-2009 The Horde Project (http://www.horde.org/)
 * Copyright 1999-2004 Jon Parise <jon@horde.org>
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Chuck Hagenbuch <chuck@horde.org>
 * @author  Jon Parise <jon@horde.org>
 * @since   Horde 3.0
 * @package Horde_Util
 */
class Util {

    /**
     * If magic_quotes_gpc is in use, run stripslashes() on $var.
     *
     * @param string &$var  The string to un-quote, if necessary.
     *
     * @return string  $var, minus any magic quotes.
     */
    function dispelMagicQuotes(&$var)
    {
        static $magic_quotes;

        if (!isset($magic_quotes)) {
            $magic_quotes = get_magic_quotes_gpc();
        }

        if ($magic_quotes) {
            if (!is_array($var)) {
                $var = stripslashes($var);
            } else {
                array_walk($var, array('Util', 'dispelMagicQuotes'));
            }
        }

        return $var;
    }

    /**
     * Get a form variable from GET or POST data, stripped of magic quotes if
     * necessary. If the variable is somehow set in both the GET data and the
     * POST data, the value from the POST data will be returned and the GET
     * value will be ignored.
     *
     * @param string $var      The name of the form variable to look for.
     * @param string $default  The value to return if the variable is not
     *                         there.
     *
     * @return string  The cleaned form variable, or $default.
     */
    function getFormData($var, $default = null)
    {
        return (($val = Util::getPost($var)) !== null)
            ? $val : Util::getGet($var, $default);
    }

    /**
     * Get a form variable from GET data, stripped of magic quotes if
     * necessary. This function will NOT return a POST variable.
     *
     * @param string $var      The name of the form variable to look for.
     * @param string $default  The value to return if the variable is not
     *                         there.
     *
     * @return string  The cleaned form variable, or $default.
     *
     * @since Horde 2.2
     */
    function getGet($var, $default = null)
    {
        return (isset($_GET[$var]))
            ? Util::dispelMagicQuotes($_GET[$var])
            : $default;
    }

    /**
     * Get a form variable from POST data, stripped of magic quotes if
     * necessary. This function will NOT return a GET variable.
     *
     * @param string $var      The name of the form variable to look for.
     * @param string $default  The value to return if the variable is not
     *                         there.
     *
     * @return string  The cleaned form variable, or $default.
     *
     * @since Horde 2.2
     */
    function getPost($var, $default = null)
    {
        return (isset($_POST[$var]))
            ? Util::dispelMagicQuotes($_POST[$var])
            : $default;
    }

    /**
     * Add a name=value pair to the end of an URL, taking care of whether
     * there are existing parameters and whether to use ? or & as the glue.
     * All data will be urlencoded.
     *
     * @param string $url        The URL to modify
     * @param string $parameter  The name=value pair to add.
     * @param string $value      If specified, the value part ($parameter is
     *                           assumed to just be the parameter name).
     *
     * @return string  The modified URL.
     *
     * @since Horde 2.1
     */
    function addParameter($url, $parameter, $value = null)
    {
        if (empty($parameter)) {
            return $url;
        }

        if (!is_array($parameter)) {
            if (is_null($value)) {
                @list($parameter, $value) = explode('=', $parameter, 2);
            }
            $add = array($parameter => $value);
        } else {
            $add = $parameter;
        }

        if (($pos = strpos($url, '?')) === false) {
            $url .= '?';
        } else {
            parse_str(substr($url, $pos + 1), $params);
            $url .= ini_get('arg_separator.output');
        }

        $url_params = array();
        foreach ($add as $parameter => $value) {
            if (!isset($params[$parameter])) {
                $url_params[] = urlencode($parameter) . '=' . urlencode($value);
            }
        }

        return $url . join(ini_get('arg_separator.output'), $url_params);
    }

    /**
     * Determines the location of the system temporary directory.
     *
     * @return string  A directory name which can be used for temp files.
     *                 Returns false if one could not be found.
     */
    function getTempDir()
    {
        /* First, try PHP's upload_tmp_dir directive. */
        $tmp = ini_get('upload_tmp_dir');

        /* Otherwise, try to determine the TMPDIR environment
         * variable. */
        if (empty($tmp)) {
            $tmp = getenv('TMPDIR');
        }

        /* If we still cannot determine a value, then cycle through a
         * list of preset possibilities. */
        $tmp_locations = array('/tmp', '/var/tmp', 'c:\WUTemp', 'c:\temp',
                               'c:\windows\temp', 'c:\winnt\temp');
        while (empty($tmp) && count($tmp_locations)) {
            $tmp_check = array_shift($tmp_locations);
            if (@is_dir($tmp_check)) {
                $tmp = $tmp_check;
            }
        }

        /* If it is still empty, we have failed, so return false;
         * otherwise return the directory determined. */
        return empty($tmp) ? false : $tmp;
    }

    /**
     * Creates a temporary filename for the lifetime of the script, and
     * (optionally) register it to be deleted at request shutdown.
     *
     * @param string $prefix   Prefix to make the temporary name more
     *                         recognizable.
     * @param boolean $delete  Delete the file at the end of the request?
     * @param string $dir      Directory to create the temporary file in.
     * @param boolean $secure  If deleting file, should we securely delete the
     *                         file?
     *
     * @return string   Returns the full path-name to the temporary file.
     *                  Returns false if a temp file could not be created.
     */
    function getTempFile($prefix = '', $delete = true, $dir = '', $secure = false)
    {
        if (empty($dir) || !is_dir($dir)) {
            $tmp_dir = Util::getTempDir();
        } else {
            $tmp_dir = $dir;
        }

        if (empty($tmp_dir)) {
            return false;
        }

        $tmp_file = tempnam($tmp_dir, $prefix);

        /* If the file was created, then register it for deletion and return. */
        if (empty($tmp_file)) {
            return false;
        }

        if ($delete) {
            Util::deleteAtShutdown($tmp_file, true, $secure);
        }
        return $tmp_file;
    }

    /**
     * Removes given elements at request shutdown.
     *
     * If called with a filename will delete that file at request shutdown; if
     * called with a directory will remove that directory and all files in that
     * directory at request shutdown.
     *
     * If called with no arguments, return all elements to be deleted (this
     * should only be done by Util::_deleteAtShutdown).
     *
     * The first time it is called, it initializes the array and registers
     * Util::_deleteAtShutdown() as a shutdown function - no need to do so
     * manually.
     *
     * The second parameter allows the unregistering of previously registered
     * elements.
     *
     * @param string $filename   The filename to be deleted at the end of the
     *                           request.
     * @param boolean $register  If true, then register the element for
     *                           deletion, otherwise, unregister it.
     * @param boolean $secure    If deleting file, should we securely delete
     *                           the file?
     */
    function deleteAtShutdown($filename = false, $register = true,
                              $secure = false)
    {
        static $dirs, $files, $securedel;

        /* Initialization of variables and shutdown functions. */
        if (is_null($dirs)) {
            $dirs = array();
            $files = array();
            $securedel = array();
            register_shutdown_function(array('Util', '_deleteAtShutdown'));
        }

        if ($filename) {
            if ($register) {
                if (@is_dir($filename)) {
                    $dirs[$filename] = true;
                } else {
                    $files[$filename] = true;
                }
                if ($secure) {
                    $securedel[$filename] = true;
                }
            } else {
                unset($dirs[$filename]);
                unset($files[$filename]);
                unset($securedel[$filename]);
            }
        } else {
            return array($dirs, $files, $securedel);
        }
    }

    /**
     * Deletes registered files at request shutdown.
     *
     * This function should never be called manually; it is registered as a
     * shutdown function by Util::deleteAtShutdown() and called automatically
     * at the end of the request. It will retrieve the list of folders and
     * files to delete from Util::deleteAtShutdown()'s static array, and then
     * iterate through, deleting folders recursively.
     *
     * Contains code from gpg_functions.php.
     * Copyright 2002-2003 Braverock Ventures
     *
     * @access private
     */
    function _deleteAtShutdown()
    {
        $registered = Util::deleteAtShutdown();
        $dirs = $registered[0];
        $files = $registered[1];
        $secure = $registered[2];

        foreach ($files as $file => $val) {
            /* Delete files */
            if ($val && file_exists($file)) {
                /* Should we securely delete the file by overwriting the data
                   with a random string? */
                if (isset($secure[$file])) {
                    $filesize = filesize($file);
                    /* See http://www.cs.auckland.ac.nz/~pgut001/pubs/secure_del.html.
                     * We save the random overwrites for efficiency reasons. */
                    $patterns = array("\x55", "\xaa", "\x92\x49\x24", "\x49\x24\x92", "\x24\x92\x49", "\x00", "\x11", "\x22", "\x33", "\x44", "\x55", "\x66", "\x77", "\x88", "\x99", "\xaa", "\xbb", "\xcc", "\xdd", "\xee", "\xff", "\x92\x49\x24", "\x49\x24\x92", "\x24\x92\x49", "\x6d\xb6\xdb", "\xb6\xdb\x6d", "\xdb\x6d\xb6");
                    $fp = fopen($file, 'r+');
                    foreach ($patterns as $pattern) {
                        $pattern = substr(str_repeat($pattern, floor($filesize / strlen($pattern)) + 1), 0, $filesize);
                        fwrite($fp, $pattern);
                        fseek($fp, 0);
                    }
                    fclose($fp);
                }
                @unlink($file);
            }
        }

        foreach ($dirs as $dir => $val) {
            /* Delete directories */
            if ($val && file_exists($dir)) {
                /* Make sure directory is empty. */
                $dir_class = dir($dir);
                while (false !== ($entry = $dir_class->read())) {
                    if ($entry != '.' && $entry != '..') {
                        @unlink($dir . '/' . $entry);
                    }
                }
                $dir_class->close();
                @rmdir($dir);
            }
        }
    }

}
