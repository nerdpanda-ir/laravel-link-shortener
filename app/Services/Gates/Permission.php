<?php

namespace App\Services\Gates;
use App\Services\GateBase;
use App\Contracts\PermissionGateContract as Contract;

class Permission extends GateBase implements Contract
{
    public function viewAll(): bool
    {
        return $this->getPermissionManager()
                    ->has('permission-view-all');
    }

    public function create(): bool
    {
        return $this->getPermissionManager()
                        ->has('permission-create');
    }
}