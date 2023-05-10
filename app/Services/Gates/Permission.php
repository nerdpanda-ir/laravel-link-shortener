<?php

namespace App\Services\Gates;
use App\Contracts\Services\Gates\Permission as Contract;
use App\Services\AbstractCrudableGate;
use App\Traits\Services\Gates\Permission as PermissionTrait;

class Permission extends AbstractCrudableGate implements Contract
{
    use PermissionTrait;
}
