<?php

namespace App\Traits;

use App\Contracts\Model\Userable as User;

trait UserSeeterable
{
    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
