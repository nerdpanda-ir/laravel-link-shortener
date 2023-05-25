<?php

namespace App\Facades\Services;

use Illuminate\Support\Facades\Facade;
use App\Contracts\Services\AuthenticatedUser as Contract;

/**
 * @see \App\Services\AuthenticatedUser
 */
class AuthenticatedUser extends Facade
{
    protected static function getFacadeAccessor():string
    {
        return Contract::class;
    }
}
