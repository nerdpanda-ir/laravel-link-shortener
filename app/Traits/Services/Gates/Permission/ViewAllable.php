<?php

namespace App\Traits\Services\Gates\Permission;

trait ViewAllable
{
    public function viewAll(): bool
    {
        return $this->getPermissionManager()
            ->has('permission-view-all');
    }
}
