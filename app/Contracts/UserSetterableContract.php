<?php

namespace App\Contracts;
use App\Contracts\UserableContract as User;
interface UserSetterableContract
{
    public function setUser(User $user):void;
}
