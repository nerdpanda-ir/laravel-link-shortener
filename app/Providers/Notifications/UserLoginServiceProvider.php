<?php

namespace App\Providers\Notifications;

use App\Contracts\Notifications\UserLogin as Contract;
use App\Notifications\UserLoginNotification as Entity;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserLoginServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Entity::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
