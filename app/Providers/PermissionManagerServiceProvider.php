<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\PermissionManagerContract as Contract;
use App\Services\PermissionManagerService as Service;
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
