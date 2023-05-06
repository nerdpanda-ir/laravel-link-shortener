<?php

namespace App\Services\Gates;
use App\Contracts\PermissionGateContract as Contract;
use App\Contracts\PermissionManagerContract;

class Permission implements Contract
{
    protected PermissionManagerContract $permissionManager;
    public function __construct(PermissionManagerContract $permissionManager)
    {
        $this->permissionManager = $permissionManager ;
    }
}
