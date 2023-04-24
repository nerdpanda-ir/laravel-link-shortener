<?php

namespace NerdPanda\Contracts;

use Illuminate\View\ComponentAttributeBag;

interface ComponentAttributeBagFactoryProxyContract
{
    function create(?array $attributes):ComponentAttributeBag|null;
}
