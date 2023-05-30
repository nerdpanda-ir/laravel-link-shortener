<?php

namespace App\Providers\Services\Strategies\UserUpdate;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\Strategies\UserUpdate\HasRoles as Contract;
use App\Services\Strategies\UserUpdate\HasRoles as Strategy;
class HasRolesServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Strategy::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
