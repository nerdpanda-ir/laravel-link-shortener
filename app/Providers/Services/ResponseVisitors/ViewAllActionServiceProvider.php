<?php

namespace App\Providers\Services\ResponseVisitors;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\ResponseVisitors\ViewAllAction as Contract;
use App\Services\ResponseVisitors\ViewAllAction as Visitor;
class ViewAllActionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Visitor::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
