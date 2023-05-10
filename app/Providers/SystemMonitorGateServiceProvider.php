<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Services\Gates\SystemMonitor as Entity;
use App\Contracts\Services\Gates\SystemMonitor as Contract;

class SystemMonitorGateServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(Contract::class , Entity::class);
    }
    public function provides():array
    {
        return [
            Contract::class
        ];
    }
}
