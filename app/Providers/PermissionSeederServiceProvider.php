<?php

namespace App\Providers;

use App\Contracts\Seeder\Permission;
use Database\Seeders\PermissionSeeder;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PermissionSeederServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Permission::class,PermissionSeeder::class);
        $this->app->alias(Permission::class,'contract.seeder.permission');
    }
    public function provides():array
    {
        return [
            Permission::class,'contract.seeder.permission'
        ];
    }
}
