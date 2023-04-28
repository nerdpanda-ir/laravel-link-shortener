<?php

namespace App\Providers;

use App\Contracts\RoleFactoryContract;
use Database\Factories\RoleFactory;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RoleFactoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(RoleFactoryContract::class, RoleFactory::class);
        $this->app->alias(RoleFactoryContract::class,'contract.factory.role');
    }
    public function provides():array
    {
        return [
            RoleFactoryContract::class,'contract.factory.role'
        ];
    }
}
