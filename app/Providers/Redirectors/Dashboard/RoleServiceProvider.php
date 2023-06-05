<?php

namespace App\Providers\Redirectors\Dashboard;

use App\Contracts\Redirectors\Dashboard\Role as Contract;
use App\Http\Redirector\Dashboard\Role as Redirector;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(Contract::class , Redirector::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }

}
