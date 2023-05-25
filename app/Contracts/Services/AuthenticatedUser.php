<?php

namespace App\Contracts\Services;


use App\Contracts\Model\Userable;
use App\Contracts\UserSetterable;

interface AuthenticatedUser extends UserSetterable
{
    public function getUser():Userable|null;
}
