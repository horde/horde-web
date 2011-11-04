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
     * Constructor.
     *
     * @param Horde_Cache $cache The cache.
     */
    public function __construct(Horde_Cache $cache)
    {
        $this->_cache = $cache;
    }

    /**
     * List the available libraries.
     *
     * @return array The list of libraries from pear.horde.org.
     */
    public function listLibraries()
    {
        // Cache the list from pear.horde.org for one day
        if ($list = $this->_cache->get(__CLASS__ . '::list2', 86400)) {
            return unserialize($list);
        }
        $components = $this->_getComponents();
        $list = array();
        foreach ($components as $component) {
            $list[] = $component->name;
        }
        $list = array_filter($list, array($this, '_hideApplications'));
        sort($list);
        $this->_cache->set(__CLASS__ . '::list2', serialize($list));
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
        if ($descriptions = $this->_cache->get(__CLASS__ . '::descriptions2', 86400)) {
            return unserialize($descriptions);
        }
        $components = $this->_getComponents();
        $descriptions = array();
        foreach ($components as $component) {
            $descriptions[$component->name] = $component->description;
        }
        ksort($descriptions);
        $this->_cache->set(__CLASS__ . '::descriptions2', serialize($descriptions));
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
        return json_decode(
            file_get_contents(
                $GLOBALS['fs_base'] . '/config/components.d/' .
                strtolower($library) . '.json'
            )
        );
    }

    /**
     * Return the list of components from the configuration directory.
     *
     * @return array The list of released components.
     */
    private function _getComponents()
    {
        $result = array();
        $iterator = new IteratorIterator(
            new DirectoryIterator($GLOBALS['fs_base'] . '/config/components.d')
        );
        foreach ($iterator as $file) {
            if ($file->isFile() &&
                substr($file->getFilename(), -5) == '.json') {
                $result[$file->getFilename()] = json_decode(
                    file_get_contents($file->getPathname())
                );
            }
        }
        return $result;
    }
}