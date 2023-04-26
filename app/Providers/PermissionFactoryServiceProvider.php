<?php

namespace App\Providers;

use App\Contracts\PermissionFactoryContract;
use Database\Factories\PermissionFactory;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PermissionFactoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(PermissionFactoryContract::class,PermissionFactory::class);
        $this->app->alias(PermissionFactoryContract::class,'contract.factory.permission');
    }
    public function provides():array
    {
        return [
            PermissionFactoryContract::class , 'contract.factory.permission'
        ];
    }

}
