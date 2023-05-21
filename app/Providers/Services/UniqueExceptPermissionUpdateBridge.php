<?php

namespace App\Providers\Services;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Services\UniqueExceptImplBridge as Service ;
use App\Contracts\Services\UniqueExceptImplBridge as Contract;
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
