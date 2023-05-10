<?php

namespace App\Traits\Services\Gates\Role;

trait Editable
{
    public function edit(): bool
    {
        return $this->getPermissionManager()->has('role-edit');
    }
}
