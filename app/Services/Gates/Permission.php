<?php

namespace App\Services\Gates;
use App\Services\GateBase;
use App\Contracts\PermissionGateContract as Contract;
use App\Traits\Services\Gates\Permission\Deleteable;
use App\Traits\Services\Gates\Permission\Editable;

class Permission extends GateBase implements Contract
{
    use Deleteable , Editable ;



}
