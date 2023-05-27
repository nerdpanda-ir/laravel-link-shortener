<?php

namespace App\Traits\Services\Gates\User;

trait Editable
{
    public function edit(): bool
    {
        return $this->getPermissionManager()->has('user-edit');
    }
}
