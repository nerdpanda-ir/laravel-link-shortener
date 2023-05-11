<?php

namespace App\Contracts;

use App\Contracts\Services\PermissionManager;

interface PermissionManagerGetterableContract
{
    public function getPermissionManager():PermissionManager;
}
