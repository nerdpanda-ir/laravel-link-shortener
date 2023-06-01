<?php

namespace App\Services;
use App\Contracts\Services\UserPermissionsRepository as Contract;
abstract class UserPermissionsRepositoryAbstract implements Contract
{
    protected array $permissions = [];

    public function get(string $permission): bool
    {
        return $this->permissions[$permission];
    }

    public function has(string $permission): bool
    {
        return array_key_exists($permission,$this->permissions);
    }

    public function put(string $permission, bool $value): void
    {
        $this->permissions[$permission] = $value;
    }

}
