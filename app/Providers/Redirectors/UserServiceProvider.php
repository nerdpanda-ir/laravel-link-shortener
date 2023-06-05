<?php

namespace App\Providers\Redirectors;

use App\Contracts\Redirectors\Dashboard\User as Contract;
use App\Http\Redirector\User as Redirector;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Redirector::class);
        $this->app->alias(Contract::class,'contract.redirector.user');
    }
    public function provides():array
    {
        return [Contract::class,'contract.redirector.user'];
    }
}
