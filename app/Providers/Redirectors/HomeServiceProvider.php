<?php

namespace App\Providers\Redirectors;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Redirectors\Home as Contract;
use App\Http\Redirector\Home as Redirector;
class HomeServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Redirector::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
