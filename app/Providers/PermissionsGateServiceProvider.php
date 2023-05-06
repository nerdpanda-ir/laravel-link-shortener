<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\PermissionGateContract as Contract;
use App\Services\Gates\Permission as Service;

class PermissionsGateServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(Contract::class , Service::class);
    }

    public function provides():array
    {
        return [
            Contract::class ,
        ];
    }
}
