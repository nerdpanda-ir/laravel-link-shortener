<?php

namespace NerdPanda\Facades;

use Illuminate\Support\Facades\Facade;
use Illuminate\View\ComponentAttributeBag;
use NerdPanda\Providers\ComponentAttributeBagFactoryProxyProvider;

/** @method ComponentAttributeBag|null create(null|array $attributes)*/
class ComponentAttributeBagFactoryProxyFacade extends Facade
{
    protected static function getFacadeAccessor():string
    {
        app()->loadDeferredProvider(ComponentAttributeBagFactoryProxyProvider::class);
        return config('componentAttributeBagFactoryProxy.alias');
    }
}
