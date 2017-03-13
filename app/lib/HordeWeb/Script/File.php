<?php
/**
 * Copyright 2017 Horde LLC (http://www.horde.org/)
 *
 * @category  Horde
 * @license   http://www.horde.org/licenses/lgpl21 LGPL 2.1
 * @package   HordeWeb
 */

/**
 * This class represents a javascript script file located in the js/ directory.
 *
 * @author    Jan Schneider <jan@horde.org>
 * @category  Horde
 * @copyright 2017 Horde LLC
 * @license   http://www.horde.org/licenses/lgpl21 LGPL 2.1
 * @package   HordeWeb
 */
class HordeWeb_Script_File extends Horde_Script_File
{
    /**
     */
    public function __construct($file)
    {
        $this->_file = $file;
    }

    /**
     */
    public function __get($name)
    {
        switch ($name) {
        case 'path':
            return $GLOBALS['fs_base'] . '/js/';

        case 'url':
        case 'url_full':
            return $this->_url(
                $GLOBALS['host_base'] . '/js/' . $this->_file,
                $name == 'url_full'
            );
        }

        return parent::__get($name);
    }

}
