<?php

namespace App\Services;

use App\Contracts\PermissionManagerContract as Contract;
use App\Contracts\PermissionsFlyWeightContract;

class PermissionManagerService implements Contract
{
    protected PermissionsFlyWeightContract $permissionFlyWeight;
    public function __construct(PermissionsFlyWeightContract $permissionFlyWeight)
    {
        $this->permissionFlyWeight = $permissionFlyWeight ;
    }
    public function has(string $permission): bool
    {
        return in_array(
            $permission,$this->permissionFlyWeight->getPermissions()
        );
    }
}
