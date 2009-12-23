<?php
/**
 * The Util:: class provides generally useful methods of different kinds.
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

}
