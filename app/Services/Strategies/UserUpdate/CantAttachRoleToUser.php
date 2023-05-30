<?php

namespace App\Services\Strategies\UserUpdate;
use App\Contracts\Services\Strategies\UserUpdate\CantAttachRoleToUser as Contract;
use App\Services\UserUpdateStrategy;

class CantAttachRoleToUser extends UserUpdateStrategy implements Contract
{

    public function updateCommand(): bool
    {
        return $this->updateUser();
    }
}
