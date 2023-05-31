<?php

namespace App\Providers\Services\ResponseVisitors;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\ResponseVisitors\UserRegisterAction as Contract;
use App\Services\ResponseVisitors\UserRegisterAction as ResponseVisitor;
class UserRegisterActionServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,ResponseVisitor::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
