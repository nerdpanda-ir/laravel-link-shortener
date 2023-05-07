<?php

namespace App\Contracts;
use App\Contracts\GateViewAllableContract as Viewallable;
use App\Contracts\GateCreateableContract as Createable;
use App\Contracts\GateEditable as Editable;
use App\Contracts\GateDeleteable as Deleteable ;
interface PermissionGateContract extends Viewallable , Createable , Editable , Deleteable
{

}
