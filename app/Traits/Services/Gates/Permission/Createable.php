<?php

namespace App\Traits\Services\Gates\Permission;

trait Createable
{
    public function create(): bool
    {
        return $this->getPermissionManager()
            ->has('permission-create');
    }
}
