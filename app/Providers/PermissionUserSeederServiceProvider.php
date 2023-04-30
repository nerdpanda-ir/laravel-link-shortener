<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Database\Seeders\PermissionUserSeeder as Entity;
use App\Contracts\PermissionUserSeederContract as Contract;

class PermissionUserSeederServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Entity::class);
        $this->app->alias(Contract::class , 'contract.seeder.permissionUser');
    }
    public function provides():array
    {
        return [
            Contract::class , 'contract.seeder.permissionUser'
        ];
    }
}
