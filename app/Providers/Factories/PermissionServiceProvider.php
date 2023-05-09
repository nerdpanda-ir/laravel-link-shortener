<?php

namespace App\Providers\Factories;

use App\Contracts\Factories\Permission;
use Database\Factories\PermissionFactory;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Permission::class,PermissionFactory::class);
        $this->app->alias(Permission::class,'contract.factory.permission');
    }
    public function provides():array
    {
        return [
            Permission::class , 'contract.factory.permission'
        ];
    }

}
