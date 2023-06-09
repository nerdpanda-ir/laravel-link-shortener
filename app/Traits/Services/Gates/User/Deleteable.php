<?php

namespace App\Traits\Services\Gates\User;

trait Deleteable
{
    public function delete(): bool
    {
        return $this->getPermissionManager()->has('user-delete');
    }
}
