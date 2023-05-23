<?php

namespace App\Traits\Services\Gates\User;

trait ViewAllable
{
    public function viewAll(): bool
    {
        return $this->getPermissionManager()->has('user-view-all');
    }
}
