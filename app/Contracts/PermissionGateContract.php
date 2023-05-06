<?php

namespace App\Contracts;
use App\Contracts\GateViewAllableContract as Viewallable;
use App\Contracts\GateCreateableContract as Createable;
interface PermissionGateContract extends Viewallable , Createable
{

}
