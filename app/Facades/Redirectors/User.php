<?php

namespace App\Facades\Redirectors;
use Illuminate\Support\Facades\Facade;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * @see \App\Http\Redirector\Dashboard\User
 * @method RedirectResponse viewAll()
 */
class User extends Facade
{
    protected static function getFacadeAccessor():string
    {
        return 'contract.redirector.user';
    }
}
