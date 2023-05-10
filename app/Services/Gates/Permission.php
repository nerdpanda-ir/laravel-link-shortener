<?php

namespace App\Services\Gates;
use App\Contracts\Services\Gates\Permission as Contract;
use App\Services\GateBase;
use App\Traits\Services\Gates\Permission as PermissionTrait;

class Permission extends GateBase implements Contract
{
    use PermissionTrait;
}
