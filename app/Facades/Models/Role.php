<?php

namespace App\Facades\Models;
use Illuminate\Support\Facades\Facade;
use App\Contracts\Model\Role as ModelContract;

/**
 * @see \App\Models\Role
 */
class Role extends Facade
{
    protected static function getFacadeAccessor():string
    {
        return ModelContract::class;
    }
}
