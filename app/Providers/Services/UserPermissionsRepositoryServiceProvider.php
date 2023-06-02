<?php

namespace App\Providers\Services;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\UserPermissionsRepository as Contract;
use App\Services\UserPermissionsRepositoryImpl as Service;
class UserPermissionsRepositoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Service::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
