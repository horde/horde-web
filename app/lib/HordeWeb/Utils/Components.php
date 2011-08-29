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
class HordeWeb_Utils_Components
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
     * List the available components.
     *
     * @return array The list of components from pear.horde.org.
     */
    public function listComponents()
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
     * Separate component libraries from applications.
     *
     * @param string $component The component name.
     *
     * @return boolean True if the component name indicates a library.
     */
    private function _hideApplications($component)
    {
        if (strpos($component, 'Horde_') === 0) {
            return true;
        }
        return false;
    }

    /**
     * List the available component descriptions.
     *
     * @return array The list of components from pear.horde.org.
     */
    public function listDescriptions()
    {
        // Cache the list from pear.horde.org for one day
        if ($descriptions = $this->_cache->get(__CLASS__ . '::descriptions', 86400)) {
            return unserialize($descriptions);
        }
        $list = $this->listComponents();
        $descriptions = array();
        foreach ($list as $component) {
            $details = $this->fetchComponent($component);
            $descriptions[$component] = $details['release']->getDescription();
        }
        $this->_cache->set(__CLASS__ . '::descriptions', serialize($descriptions));
        return $descriptions;
    }

    /**
     * Fetch the component information.
     *
     * @param string $component The name of the component to fetch.
     *
     * @return array A collection of information about the latest component
     *               release.
     */
    public function fetchComponent($component)
    {
        // Cache the component from pear.horde.org for roughly one day
        $life = 86400 + mt_rand(0, 7200);
        if ($c = $this->_cache->get(__CLASS__ . '::comp::' . $component, $life)) {
            if ($c['version'] == 2) {
                return unserialize($c);
            }
        }
        $c = array('version' => 2);
        $c['release'] = $this->_remote->getLatestDetails($component);
        $c['has_ci'] = $this->_hasCi($component);
        $this->_cache->set(__CLASS__ . '::comp::' . $component, serialize($c));
        return $c;
    }

    /**
     * Check if the component has a CI job.
     *
     * @param string $component The name of the component.
     *
     * @return boolean True if a CI job is defined.
     */
    private function _hasCi($component)
    {
        $client = new Horde_Http_Client(array('request.timeout' => 15));
        try {
            $response = $client->get('http://ci.horde.org/job/' . str_replace('Horde_', '', $component . '/api/json'));
        } catch (Horde_Http_Exception $e) {
            return false;
        }
        return $response->code != 404;
    }
}