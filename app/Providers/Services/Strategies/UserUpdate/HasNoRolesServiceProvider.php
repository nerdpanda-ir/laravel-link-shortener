<?php

namespace App\Providers\Services\Strategies\UserUpdate;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\Strategies\UserUpdate\HasNoRoles as Contract;
use App\Services\Strategies\UserUpdate\HasNoRoles as Strategy;
class HasNoRolesServiceProvider extends ServiceProvider
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
