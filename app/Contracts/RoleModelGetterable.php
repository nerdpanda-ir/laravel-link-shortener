<?php

namespace App\Contracts;

use App\Contracts\Model\Role;

interface RoleModelGetterable
{
    public function getRoleModel():Role;
}
