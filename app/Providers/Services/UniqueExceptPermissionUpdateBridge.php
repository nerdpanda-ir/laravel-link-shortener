<?php

namespace App\Providers\Services;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Services\UniqueExceptPermissionUpdateBridge as Service ;
use App\Contracts\Services\UniqueExceptPermissionUpdateBridge as Contract;
class UniqueExceptPermissionUpdateBridge
    extends ServiceProvider
    implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Service::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
