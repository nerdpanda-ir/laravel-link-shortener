<?php

namespace App\Contracts;

use Illuminate\View\ComponentAttributeBag;

interface ComponentAttributeBagFactoryProxyContract
{
    function create(?array $attributes):ComponentAttributeBag|null;
}
