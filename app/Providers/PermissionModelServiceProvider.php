<?php

namespace App\Providers;

use App\Contracts\PermissionModelContract;
use App\Models\Permission;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PermissionModelServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(PermissionModelContract::class,Permission::class);
        $this->app->alias(PermissionModelContract::class , 'contract.model.permission');
    }
    public function provides():array
    {
        return [
            PermissionModelContract::class , 'contract.model.permission'
        ];
    }

}
