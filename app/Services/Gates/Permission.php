<?php

namespace App\Services\Gates;
use App\Contracts\Services\Gates\Permission as Contract;
use App\Services\GateBase;
use App\Traits\Services\Gates\Permission\Createable;
use App\Traits\Services\Gates\Permission\Deleteable;
use App\Traits\Services\Gates\Permission\Editable;
use App\Traits\Services\Gates\Permission\ViewAllable;

class Permission extends GateBase implements Contract
{
    use ViewAllable , Createable , Deleteable , Editable ;
}
