<?php

namespace App\Providers\Services\ResponseVisitors;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\ResponseVisitors\NotFound as Contract;
use App\Services\ResponseVisitors\NotFound as Visitor;
class NotFoundServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Visitor::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
