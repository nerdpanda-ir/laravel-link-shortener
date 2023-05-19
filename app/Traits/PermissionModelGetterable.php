<?php

namespace App\Traits;

use App\Contracts\Model\Permission;

trait PermissionModelGetterable
{
    public function getPermissionModel():Permission {
        return $this->permissionModel;
    }
}
