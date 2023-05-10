<?php

namespace App\Providers\Services\Gates;

use App\Contracts\Services\Gates\SystemMonitor as Contract;
use App\Services\Gates\SystemMonitor as Entity;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class SystemMonitorServiceProvider extends ServiceProvider implements DeferrableProvider
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
