<?php

namespace App\Providers\Factories;

use App\Contracts\Factories\Role;
use Database\Factories\RoleFactory;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Role::class, RoleFactory::class);
        $this->app->alias(Role::class,'contract.factory.role');
    }
    public function provides():array
    {
        return [
            Role::class,'contract.factory.role'
        ];
    }
}
