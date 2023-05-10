<?php

namespace App\Providers;

use App\Contracts\Services\Gates\Permission as Contract;
use App\Services\Gates\Permission as Service;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

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
