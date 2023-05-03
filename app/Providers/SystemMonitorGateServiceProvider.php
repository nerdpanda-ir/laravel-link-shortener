<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Services\Gates\SystemMonitor as Entity;

class SystemMonitorGateServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Entity::class);
    }
    public function provides():array
    {
        return [
            Entity::class
        ];
    }
}
