<?php

namespace App\Providers\Observers\Permission;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Observers\Permission\Logger as Contract;
use App\Observers\Permission\Logger as Observer;
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
