<?php

namespace App\Traits\Services\Gates\Permission;

trait Deleteable
{
    public function delete(): bool
    {
        return $this->getPermissionManager()
            ->has('permission-delete');
    }
}
