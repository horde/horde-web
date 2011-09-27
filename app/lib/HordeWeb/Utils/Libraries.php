<?php
/**
 * Deals with the list of packages on pear.horde.org.
 *
 * PHP version 5
 *
 * @category Horde
 * @package  HordeWeb
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.fsf.org/copyleft/lgpl.html LGPL
 * @link     http://www.horde.org
 */

/**
 * Deals with the list of packages on pear.horde.org.
 *
 * Copyright 2011 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @category Horde
 * @package  HordeWeb
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.fsf.org/copyleft/lgpl.html LGPL
 * @link     http://www.horde.org
 */
class HordeWeb_Utils_Libraries
{
    /**
     * The cache.
     *
     * @var Horde_Cache
     */
    private $_cache;

    /**
     * Handler for the remote PEAR server.
     *
     * @var Horde_Pear_Remote
     */
    private $_remote;

    /**
     * Constructor.
     *
     * @param Horde_Cache $cache The cache.
     */
    public function __construct(Horde_Cache $cache)
    {
        $this->_cache = $cache;
        $this->_remote = new Horde_Pear_Remote();
    }

    /**
     * Override for the default remote handler.
     *
     * @param Horde_Pear_Remote $remote The remote handler.
     *
     * @return NULL
     */
    public function setRemote(Horde_Pear_Remote $remote)
    {
        $this->_remote = $remote;
    }

    /**
     * List the available libraries.
     *
     * @return array The list of libraries from pear.horde.org.
     */
    public function listLibraries()
    {
        // Cache the list from pear.horde.org for one day
        if ($list = $this->_cache->get(__CLASS__ . '::list', 86400)) {
            return unserialize($list);
        }
        $list = $this->_remote->listPackages();
        $list = array_filter($list, array($this, '_hideApplications'));
        $this->_cache->set(__CLASS__ . '::list', serialize($list));
        return $list;
    }

    /**
     * Separate library libraries from applications.
     *
     * @param string $library The library name.
     *
     * @return boolean True if the library name indicates a library.
     */
    private function _hideApplications($library)
    {
        if (strpos($library, 'Horde_') === 0) {
            return true;
        }
        return false;
    }

    /**
     * List the available library descriptions.
     *
     * @return array The list of libraries from pear.horde.org.
     */
    public function listDescriptions()
    {
        // Cache the list from pear.horde.org for one day
        if ($descriptions = $this->_cache->get(__CLASS__ . '::descriptions', 86400)) {
            return unserialize($descriptions);
        }
        $list = $this->listLibraries();
        $descriptions = array();
        foreach ($list as $library) {
            $details = $this->fetchLibrary($library);
            $descriptions[$library] = $details['release']->getDescription();
        }
        $this->_cache->set(__CLASS__ . '::descriptions', serialize($descriptions));
        return $descriptions;
    }

    /**
     * Fetch the library information.
     *
     * @param string $library The name of the library to fetch.
     *
     * @return array A collection of information about the latest library
     *               release.
     */
    public function fetchLibrary($library)
    {
        // Cache the library from pear.horde.org for roughly one day
        $version = 2;
        $life = 86400 + mt_rand(0, 7200);
        if ($c = $this->_cache->get(__CLASS__ . '::comp::' . $library . $version, $life)) {
            return unserialize($c);
        }

        $c = array('release' => $this->_remote->getLatestDetails($library),
                   'has_ci' => $this->_hasCi($library));
        $this->_cache->set(__CLASS__ . '::comp::' . $library . $version, serialize($c));

        return $c;
    }

    /**
     * Check if the library has a CI job.
     *
     * @param string $library The name of the library.
     *
     * @return boolean True if a CI job is defined.
     */
    private function _hasCi($library)
    {
        $client = new Horde_Http_Client(array('request.timeout' => 15));
        try {
            $response = $client->get('http://ci.horde.org/job/' . str_replace('Horde_', '', $library . '/api/json'));
        } catch (Horde_Http_Exception $e) {
            return false;
        }
        return $response->code != 404;
    }
}