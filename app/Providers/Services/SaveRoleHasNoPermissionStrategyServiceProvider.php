<?php

namespace App\Providers\Services;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Services\SaveRoleHasNoPermissionStrategy as Strategy;
use App\Contracts\Services\SaveRoleHasNoPermissionStrategy as Contract;
class SaveRoleHasNoPermissionStrategyServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Strategy::class);
        $this->app->alias(
            Contract::class,
            'contract.service.save_role_has_no_permission_strategy'
        );
    }
    public function provides()
    {
        return [
            Contract::class,'contract.service.save_role_has_no_permission_strategy'
        ];
    }
}
