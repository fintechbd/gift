<?php

namespace Fintech\Gift\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * // Crud Service Method Point Do not Remove //
 *
 * @see \Fintech\Gift\Gift
 */
class Gift extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Fintech\Gift\Gift::class;
    }
}
