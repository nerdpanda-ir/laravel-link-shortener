<?php

namespace App\Contracts;

interface HasPermissionableContract
{
    public function has(string $permission):bool;
}
