<?php

namespace App\Providers;

use App\Contracts\UserFactoryContract;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserFactoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(UserFactoryContract::class,UserFactory::class);
        $this->app->alias(UserFactoryContract::class,'contract.factory.user');
    }
    public function provides():array
    {
        return [
            UserFactoryContract::class,'contract.factory.user'
        ];
    }
}
