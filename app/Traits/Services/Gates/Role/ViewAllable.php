<?php

namespace App\Traits\Services\Gates\Role;

trait ViewAllable
{
    public function viewAll(): bool
    {
        return $this->getPermissionManager()->has('role-view-all');
    }
}
