<?php

namespace App\Facades\Models;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Models\User
 */
class User extends Facade
{
    protected static function getFacadeAccessor():string
    {
        return 'model.contract.user';
    }
}
