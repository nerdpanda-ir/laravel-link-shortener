<?php

namespace App\Providers;

use App\Contracts\Services\PermissionsToArray as Contract;
use App\Services\PermissionsToArrayJustNameStrategyService as Service;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PermissionsToArrayServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(Contract::class , Service::class);
        $this->app->alias(Contract::class,'permissionsToArray');
    }
    public function provides():array
    {
        return [Contract::class , 'permissionsToArray'];
    }
}
