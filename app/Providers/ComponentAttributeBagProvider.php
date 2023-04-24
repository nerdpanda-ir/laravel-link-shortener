<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\ComponentAttributeBag;
class ComponentAttributeBagProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->alias(ComponentAttributeBag::class,'componentAttributeBag');
    }
    public function provides():array
    {
        return ['componentAttributeBag'];
    }
}
