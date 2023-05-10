<?php

namespace App\Traits\Services\Gates\Role;

trait Deleteable
{
    public function delete(): bool
    {
        return $this->getPermissionManager()->has('role-delete');
    }
}
