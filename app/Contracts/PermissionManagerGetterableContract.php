<?php

namespace App\Contracts;

interface PermissionManagerGetterableContract
{
    public function getPermissionManager():PermissionManagerContract;
}
