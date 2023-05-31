<?php

namespace App\Facades\Redirectors;

use Illuminate\Support\Facades\Facade;
use App\Contracts\Redirectors\Home as Accessor;
class Home extends Facade
{
    protected static function getFacadeAccessor():string
    {
        return Accessor::class;
    }
}
