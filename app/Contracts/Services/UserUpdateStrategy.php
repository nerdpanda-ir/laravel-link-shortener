<?php

namespace App\Contracts\Services;

use App\Contracts\RequestGetterable;
use App\Contracts\Userable;

interface UserUpdateStrategy extends Userable , RequestGetterable
{
    public function updateCommand():bool;
}
