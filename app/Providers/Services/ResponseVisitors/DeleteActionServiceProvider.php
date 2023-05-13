<?php

namespace App\Providers\Services\ResponseVisitors;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\ResponseVisitors\DeleteAction as Contract;
use App\Services\ResponseVisitors\DeleteAction as Visitor;
class DeleteActionServiceProvider extends ServiceProvider implements DeferrableProvider
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
