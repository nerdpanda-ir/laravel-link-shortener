<?php

namespace App\Services\Gates;
use App\Services\GateBase;
use App\Contracts\PermissionGateContract as Contract;
use App\Traits\Services\Gates\Permission\Deleteable;
use App\Traits\Services\Gates\Permission\Editable;

class Permission extends GateBase implements Contract
{
    use Deleteable , Editable ;
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
