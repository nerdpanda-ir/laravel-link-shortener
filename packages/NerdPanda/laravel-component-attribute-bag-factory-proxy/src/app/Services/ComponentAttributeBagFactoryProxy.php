<?php
namespace NerdPanda\Services;

use NerdPanda\Contracts\ComponentAttributeBagFactoryProxyContract;
use Illuminate\View\ComponentAttributeBag;

class ComponentAttributeBagFactoryProxy implements ComponentAttributeBagFactoryProxyContract
{
    public function create(?array $attributes):ComponentAttributeBag|null {
        if (is_null($attributes))
            return null;
        return app('componentAttributeBag',['attributes'=>$attributes]);
    }
}
