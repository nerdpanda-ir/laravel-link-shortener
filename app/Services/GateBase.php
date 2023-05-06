<?php

namespace App\Services;
use App\Contracts\PermissionManagerContract as PermissionManager;
use App\Contracts\GateContract as Contract;
class GateBase implements Contract
{
    protected PermissionManager $permissionManager;
    public function __construct(PermissionManager $permissionManager)
    {
        $this->permissionManager = $permissionManager;
    }
    public function getPermissionManager(): PermissionManager
    {
        return $this->permissionManager;
    }
}

