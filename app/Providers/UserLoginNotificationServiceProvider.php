<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\UserLoginNotificationContract as Contract;
use App\Notifications\UserLoginNotification as Entity;
class UserLoginNotificationServiceProvider extends ServiceProvider implements DeferrableProvider
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
