<?php

namespace App\Providers\Seeder;

use App\Contracts\Seeder\Role;
use Database\Seeders\RoleSeeder;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Role::class,RoleSeeder::class);
        $this->app->alias(Role::class,'contract.seeder.role');
    }
    public function provides():array
    {
        return [
            Role::class,'contract.seeder.role'
        ];
    }
}
