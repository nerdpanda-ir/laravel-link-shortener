<?php

namespace App\Facades\Services\ResponseVisitors;

use Illuminate\Support\Facades\Facade;
use App\Contracts\Services\ResponseVisitors\EditAction as Accessor;
class EditAction extends Facade
{
    protected static function getFacadeAccessor():string
    {
        return Accessor::class;
    }
}
