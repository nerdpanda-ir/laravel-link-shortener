<?php

namespace App\Providers\Services;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Services\UniqueExceptExistablePermissionUpdateBridge as Service ;
use App\Contracts\Services\UniqueExceptExistablePermissionUpdateBridge as Contract;
class UniqueExceptExistablePermissionUpdateBridgeServiceProvider
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
