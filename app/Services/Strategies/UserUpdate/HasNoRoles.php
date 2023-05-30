<?php

namespace App\Services\Strategies\UserUpdate;

use App\Services\UserUpdateStrategy;
use App\Contracts\Services\Strategies\UserUpdate\HasNoRoles as Contract;
class HasNoRoles extends UserUpdateStrategy implements Contract
{
    public function updateCommand(): bool
    {
        \DB::beforeExecuting();
        $updated = $this->updateUser();
        $this->getUser()->roles()->sync([]);
        \DB::commit();
        return $updated;
    }
}
