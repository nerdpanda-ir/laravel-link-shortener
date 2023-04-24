<?php

namespace NerdPanda\Facades;

use Illuminate\Support\Facades\Facade;
use Illuminate\View\ComponentAttributeBag;

/** @method ComponentAttributeBag|null create(null|array $attributes)*/
class ComponentAttributeBagFactoryProxyFacade extends Facade
{
    protected static function getFacadeAccessor():string
    {
        return config('componentAttributeBagFactoryProxy.alias');
    }
}
