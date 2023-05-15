<?php

namespace App\Contracts;
use App\Contracts\Model\Userable as User;

interface UserSetterable
{
    public function setUser(User $user):void;
}
