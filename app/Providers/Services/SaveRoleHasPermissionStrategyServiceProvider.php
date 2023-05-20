<?php

namespace App\Providers\Services;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\SaveRoleHasPermissionStrategy as Contract;
use App\Services\SaveRoleHasPermissionStrategy as Strategy;
class SaveRoleHasPermissionStrategyServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Strategy::class);
        $this->app->alias(
            Contract::class,
            'contract.service.save_role_has_permission_strategy'
        );
    }
    public function provides()
    {
        return [
            'contract.service.save_role_has_permission_strategy',Contract::class
        ];
    }
}
