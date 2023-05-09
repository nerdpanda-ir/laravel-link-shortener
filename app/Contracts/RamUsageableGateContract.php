<?php

namespace App\Contracts;

use App\Contracts\Model\Userable;

interface RamUsageableGateContract
{
    public function ramUsage(Userable $user):bool;
}
