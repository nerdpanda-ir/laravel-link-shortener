<?php

namespace App\Providers\Services;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\UserUpdateStrategyFactory as Contract;
use App\Services\UserUpdateStrategyFactory as Factory;
class UserUpdateStrategyFactoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Factory::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
