<?php
/**
 * Deals with the list of Horde library packages.
 *
 * Copyright 2011-2026 Horde LLC (http://www.horde.org)
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @category Horde
 * @package  HordeWeb
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @author   Ralf Lang <ralf.lang@ralf-lang.de>
 * @license  http://www.fsf.org/copyleft/lgpl.html LGPL
 * @link     http://www.horde.org
 */
class HordeWeb_Utils_Libraries
{
    private Horde_Cache $_cache;

    public function __construct(Horde_Cache $cache)
    {
        $this->_cache = $cache;
    }

    /**
     * List the available libraries.
     *
     * @param string $era 'h5' or 'h6'
     * @return array
     */
    public function listLibraries(string $era = 'h6'): array
    {
        $cacheKey = __CLASS__ . '::list::' . $era;
        if ($list = $this->_cache->get($cacheKey, 86400)) {
            return unserialize($list);
        }
        $components = $this->_getComponents($era);
        $list = array();
        foreach ($components as $component) {
            $list[] = $component->name;
        }
        $list = array_filter($list, array($this, '_hideApplications'));
        sort($list);
        $this->_cache->set($cacheKey, serialize($list));
        return $list;
    }

    private function _hideApplications($library): bool
    {
        return strpos($library, 'Horde_') === 0;
    }

    /**
     * List the available library descriptions.
     *
     * @param string $era 'h5' or 'h6'
     * @return array
     */
    public function listDescriptions(string $era = 'h6'): array
    {
        $cacheKey = __CLASS__ . '::descriptions::' . $era;
        if ($descriptions = $this->_cache->get($cacheKey, 86400)) {
            return unserialize($descriptions);
        }
        $components = $this->_getComponents($era);
        $descriptions = array();
        foreach ($components as $component) {
            $descriptions[$component->name] = $component->description;
        }
        ksort($descriptions);
        $this->_cache->set($cacheKey, serialize($descriptions));
        return $descriptions;
    }

    /**
     * Fetch the library information.
     *
     * @param string $library The name of the library to fetch.
     * @param string $era 'h5' or 'h6'
     * @return object
     */
    public function fetchLibrary(string $library, string $era = 'h6'): object
    {
        return json_decode(
            file_get_contents(
                $GLOBALS['fs_base'] . '/config/' . $era . '/components.d/' .
                strtolower($library) . '.json'
            )
        );
    }

    /**
     * Return the list of components from the configuration directory.
     *
     * @param string $era 'h5' or 'h6'
     * @return array
     */
    private function _getComponents(string $era = 'h6'): array
    {
        $result = array();
        $dir = $GLOBALS['fs_base'] . '/config/' . $era . '/components.d';
        $iterator = new IteratorIterator(
            new DirectoryIterator($dir)
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
