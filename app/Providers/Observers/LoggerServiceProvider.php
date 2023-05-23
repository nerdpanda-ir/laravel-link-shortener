<?php

namespace App\Providers\Observers;

use App\Observers\Logger as Observer;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class LoggerServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(Observer::class);
    }
    public function provides():array
    {
        return [Observer::class];
    }
}
