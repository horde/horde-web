<?php
/**
 * Factory for creating Routes Matcher instances
 *
 * Copyright 2011-2026 Horde LLC (http://www.horde.org)
 *
 * See the enclosed file LICENSE for license information (BSD-2-Clause).
 */

use Horde\Routes\Mapper;
use Horde\Routes\Matcher;

/**
 * Factory for Routes Matcher
 *
 * @package HordeWeb
 */
class HordeWeb_Factory_RoutesMatcher extends Horde_Core_Factory_Injector
{
    /**
     * Create a new Matcher instance
     *
     * @param Horde_Injector $injector  The injector instance
     *
     * @return Matcher
     */
    public function create(Horde_Injector $injector)
    {
        $mapper = $injector->getInstance(Mapper::class);
        $request = $injector->getInstance('Horde_Controller_Request');
        return new Matcher($mapper, $request);
    }
}
