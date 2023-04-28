<?php

namespace App\Providers;

use App\Contracts\RoleSeederContract;
use Database\Seeders\RoleSeeder;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RoleSeederServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(RoleSeederContract::class,RoleSeeder::class);
        $this->app->alias(RoleSeederContract::class,'contract.seeder.role');
    }
    public function provides():array
    {
        return [
            RoleSeederContract::class,'contract.seeder.role'
        ];
    }
}
