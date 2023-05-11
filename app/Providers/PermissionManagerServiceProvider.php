<?php

namespace App\Providers;

use App\Contracts\Services\PermissionManager as Contract;
use App\Services\PermissionManagerService as Service;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PermissionManagerServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(Contract::class,Service::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
