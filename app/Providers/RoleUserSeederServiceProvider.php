<?php

namespace App\Providers;

use App\Contracts\Seeder\RoleUser as Contract;
use Database\Seeders\RoleUserSeeder as Entity;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RoleUserSeederServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Entity::class);
        $this->app->alias(Contract::class,'contract.seeder.roleUser');
    }

    public function boot(): void
    {
    }
    public function provides():array
    {
        return [Contract::class,'contract.seeder.roleUser'];
    }
}
