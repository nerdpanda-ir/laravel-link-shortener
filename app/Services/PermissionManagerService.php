<?php

namespace App\Services;

use App\Contracts\Services\PermissionManager as Contract;
use App\Contracts\Services\PermissionsFlyWeight;

class PermissionManagerService implements Contract
{
    protected PermissionsFlyWeight $permissionFlyWeight;
    public function __construct(PermissionsFlyWeight $permissionFlyWeight)
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
