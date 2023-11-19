<?php

namespace Noman\Easycrud;

use Illuminate\Support\Facades\Facade;

class EasycrudFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'easycrud';
    }
}