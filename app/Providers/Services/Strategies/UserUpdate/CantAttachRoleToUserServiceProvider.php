<?php

namespace App\Providers\Services\Strategies\UserUpdate;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\Strategies\UserUpdate\CantAttachRoleToUser as Contract;
use App\Services\Strategies\UserUpdate\CantAttachRoleToUser as Strategy;
class CantAttachRoleToUserServiceProvider extends ServiceProvider implements DeferrableProvider
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
