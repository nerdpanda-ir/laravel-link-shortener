<?php

namespace App\Services;
use App\Contracts\Services\Gate as Contract;
use App\Contracts\Services\PermissionManager;

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

