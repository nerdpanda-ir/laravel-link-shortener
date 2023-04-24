<?php

namespace App\Services;

use Illuminate\View\ComponentAttributeBag;

class ComponentAttributeBagFactoryProxy
{
    public function create(?array $attributes):ComponentAttributeBag|null {
        if (is_null($attributes))
            return null;
        return app('componentAttributeBag',['attributes'=>$attributes]);
    }
}
