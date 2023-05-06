<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\PermissionsToArrayContract as Contract ;
use App\Services\PermissionsToArrayJustNameStrategyService as Service;
class PermissionsToArrayServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(Contract::class , Service::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
