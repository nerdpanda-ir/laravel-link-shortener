<?php

namespace App\Facades\Services\ResponseVisitors;

use Illuminate\Support\Facades\Facade;
use App\Contracts\Services\ResponseVisitors\DeleteAction as Accessor;
/**
 * @see \App\Services\ResponseVisitors\DeleteAction
 */
class DeleteAction extends Facade
{
    protected static function getFacadeAccessor():string
    {
        return Accessor::class;
    }
}
