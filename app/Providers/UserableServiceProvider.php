<?php

namespace App\Providers;

use App\Contracts\UserableContract;
use App\Models\User;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserableServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(UserableContract::class,User::class);
        $this->app->alias(UserableContract::class,'model.contract.user');
    }
    public function provides():array
    {
        return [
            UserableContract::class,'model.contract.user'
        ];
    }
}
