<?php

namespace App\Traits\Services\Gates\User;

trait Createable
{
    public function create(): bool
    {
        return $this->getPermissionManager()->has('user-create');
    }
}
