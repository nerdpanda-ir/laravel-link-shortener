<?php

namespace App\Facades\Services\ResponseVisitors;

use Illuminate\Support\Facades\Facade;
use App\Contracts\Services\ResponseVisitors\NotFound as Accessor;
/** @see NotFound */
class NotFound extends Facade
{
    protected static function getFacadeAccessor():string
    {
        return Accessor::class;
    }
}
