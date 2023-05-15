<?php

namespace App\Providers\Events;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Events\Login as Contract;
use App\Events\Login as Event;

class Login extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Event::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
