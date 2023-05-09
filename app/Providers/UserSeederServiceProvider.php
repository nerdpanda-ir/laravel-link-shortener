<?php

namespace App\Providers;

use App\Contracts\Seeder\User;
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
            User::class,UserSeeder::class
        );
        $this->app->alias(User::class,'contract.seeder.user');
    }
    public function provides():array
    {
        return [
            User::class,'contract.seeder.user'
        ];
    }
}
