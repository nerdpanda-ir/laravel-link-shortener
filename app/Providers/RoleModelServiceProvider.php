<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\RoleModelContract as Contract;
use App\Models\Role as Entity;
class RoleModelServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(Contract::class , Entity::class);
        $this->app->alias(Contract::class , 'contract.model.role');
    }

    public function provides():array
    {
        return [Contract::class , 'contract.model.role'];
    }
}
