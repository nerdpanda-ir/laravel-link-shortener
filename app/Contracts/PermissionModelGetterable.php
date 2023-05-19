<?php

namespace App\Contracts;

use App\Contracts\Model\Permission;

interface PermissionModelGetterable
{
    public function getPermissionModel():Permission;
}
