<?php
/**
 * Factory for creating Routes Mapper instances
 *
 * Copyright 2011-2026 Horde LLC (http://www.horde.org)
 *
 * See the enclosed file LICENSE for license information (BSD-2-Clause).
 */

use Horde\Routes\Mapper;

/**
 * Factory for Routes Mapper
 *
 * @package HordeWeb
 */
class HordeWeb_Factory_RoutesMapper extends Horde_Core_Factory_Injector
{
    /**
     * Create a new Mapper instance
     *
     * @param Horde_Injector $injector  The injector instance
     *
     * @return Mapper
     */
    public function create(Horde_Injector $injector)
    {
        return new Mapper();
    }
}
