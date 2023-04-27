<?php

namespace App\Providers;

use App\Contracts\UserSeederContract;
use Database\Seeders\UserSeeder;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserSeederServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserSeederContract::class,UserSeeder::class
        );
        $this->app->alias(UserSeederContract::class,'contract.seeder.user');
    }
    public function provides():array
    {
        return [
            UserSeederContract::class,'contract.seeder.user'
        ];
    }
}
