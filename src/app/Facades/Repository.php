<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Repositories\UsersRepository users()
 * @method static \App\Repositories\ConnectedAccountsRepository connectedAccounts()
 */
class Repository extends Facade
{
    protected static function getFacadeAccessor(): String
    {
        return 'LoadRepository';
    }
}
