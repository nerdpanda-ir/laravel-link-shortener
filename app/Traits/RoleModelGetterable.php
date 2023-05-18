<?php

namespace App\Traits;

use App\Contracts\Model\Role;

trait RoleModelGetterable
{
    public function getRoleModel():Role {
        return $this->roleModel;
    }
}
