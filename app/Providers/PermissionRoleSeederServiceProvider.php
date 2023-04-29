<?php

namespace App\Providers;

use App\Contracts\PermissionRoleSeederContract as Contract;
use Database\Seeders\PermissionRoleSeeder as Entity;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PermissionRoleSeederServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Entity::class);
        $this->app->alias(Contract::class , 'contract.seeder.permissionRole');
    }
    public function provides():array
    {
        return [
            Contract::class , 'contract.seeder.permissionRole'
        ];
    }
}
