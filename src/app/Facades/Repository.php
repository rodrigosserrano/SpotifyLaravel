<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Repositories\UsersRepository users()
 */
class Repository extends Facade
{
    protected static function getFacadeAccessor(): String
    {
        return 'LoadRepository';
    }
}
