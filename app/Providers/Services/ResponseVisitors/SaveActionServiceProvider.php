<?php

namespace App\Providers\Services\ResponseVisitors;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\ResponseVisitors\SaveAction as Contract;
use App\Services\ResponseVisitors\SaveAction as Visitor;
class SaveActionServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(Contract::class , Visitor::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
