<?php

namespace App\Facades\Services\ResponseVisitors;

use Illuminate\Support\Facades\Facade;
use App\Contracts\Services\ResponseVisitors\CreateAction as Accessor;

/**
 * @see \App\Services\ResponseVisitors\CreateAction
 */
class CreateAction extends Facade
{
    protected static function getFacadeAccessor():string
    {
        return Accessor::class;
    }
}
