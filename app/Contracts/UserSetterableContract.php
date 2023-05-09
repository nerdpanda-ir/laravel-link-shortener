<?php

namespace App\Contracts;
use App\Contracts\Model\Userable as User;

interface UserSetterableContract
{
    public function setUser(User $user):void;
}
