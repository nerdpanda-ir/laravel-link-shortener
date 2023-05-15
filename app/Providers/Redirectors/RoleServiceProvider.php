<?php

namespace App\Providers\Redirectors;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Redirectors\Role as Contract;
use App\Http\Redirector\Role as Redirector;
class RoleServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Redirector::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }

}
