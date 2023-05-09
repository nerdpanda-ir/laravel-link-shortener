<?php

namespace App\Providers\Factories;

use App\Contracts\Factories\User;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(User::class,UserFactory::class);
        $this->app->alias(User::class,'contract.factory.user');
    }
    public function provides():array
    {
        return [
            User::class,'contract.factory.user'
        ];
    }
}
