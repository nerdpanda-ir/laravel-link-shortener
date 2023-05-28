<?php

namespace App\Facades\Services\ResponseVisitors;

use Illuminate\Support\Facades\Facade;
use App\Contracts\Services\ResponseVisitors\UpdateAction as Accessor;

/**
 * @see \App\Services\ResponseVisitors\UpdateAction
 */
class UpdateAction extends Facade
{
    protected static function getFacadeAccessor():string
    {
        return Accessor::class ;
    }
}
