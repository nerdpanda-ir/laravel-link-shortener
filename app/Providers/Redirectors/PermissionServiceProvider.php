<?php

namespace App\Providers\Redirectors;

use App\Contracts\Redirectors\Dashboard\Permission as Contract;
use App\Http\Redirector\Dashboard\Permission as Redirector;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(Contract::class,Redirector::class);
        $this->app->alias(Contract::class, 'contract.redirector.permission');
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
