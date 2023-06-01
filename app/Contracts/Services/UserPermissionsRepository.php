<?php

namespace App\Contracts\Services;

interface UserPermissionsRepository
{
    public function get(string $permission):bool;
    public function has(string $permission):bool;
    public function put(string $permission , bool $value):void;
}
