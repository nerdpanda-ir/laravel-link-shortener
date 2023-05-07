<?php

namespace App\Traits\Services\Gates\Permission;

trait Editable
{
    public function edit(): bool
    {
        return $this->getPermissionManager()
            ->has('permission-edit');
    }
}
