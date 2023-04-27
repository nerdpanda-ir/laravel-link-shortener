<?php

namespace App\Providers;

use App\Contracts\PermissionSeederContract;
use Database\Seeders\PermissionSeeder;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PermissionSeederServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(PermissionSeederContract::class,PermissionSeeder::class);
        $this->app->alias(PermissionSeederContract::class,'contract.seeder.permission');
    }
    public function provides():array
    {
        return [
            PermissionSeederContract::class,'contract.seeder.permission'
        ];
    }
}
