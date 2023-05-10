<?php

namespace App\Contracts\Services\Gates\SystemMonitor;

use App\Contracts\Model\Userable;

interface RamUsageableGateContract
{
    public function ramUsage(Userable $user):bool;
}
