<?php

namespace App\Providers\Seeder;

use App\Contracts\Seeder\PermissionUser as Contract;
use Database\Seeders\PermissionUserSeeder as Entity;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PermissionUserServiceProvider extends ServiceProvider implements DeferrableProvider
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
