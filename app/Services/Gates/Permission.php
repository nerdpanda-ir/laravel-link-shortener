<?php

namespace App\Services\Gates;
use App\Services\GateBase;
use App\Contracts\PermissionGateContract as Contract;
use App\Traits\Services\Gates\Permission\Createable;
use App\Traits\Services\Gates\Permission\Deleteable;
use App\Traits\Services\Gates\Permission\Editable;
use App\Traits\Services\Gates\Permission\ViewAllable;

class Permission extends GateBase implements Contract
{
    use ViewAllable , Createable , Deleteable , Editable ;
}
