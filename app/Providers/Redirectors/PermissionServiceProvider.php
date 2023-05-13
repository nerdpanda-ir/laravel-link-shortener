<?php

namespace App\Providers\Redirectors;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Redirectors\Permission as Contract;
use App\Http\Redirector\Permission as Redirector;
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
