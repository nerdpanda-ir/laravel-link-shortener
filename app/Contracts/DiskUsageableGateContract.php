<?php

namespace App\Contracts;

use App\Contracts\Model\Userable;

interface DiskUsageableGateContract
{
    public function diskUsage(Userable $user):bool;
}
