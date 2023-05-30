<?php

namespace App\Contracts\Services;

use App\Contracts\RequestGetterable;
use App\Contracts\Userable;

interface UserUpdateStrategy extends Userable
{
    public function updateCommand():bool;
}
