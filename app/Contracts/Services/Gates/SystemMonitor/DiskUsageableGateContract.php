<?php

namespace App\Contracts\Services\Gates\SystemMonitor;

use App\Contracts\Model\Userable;

interface DiskUsageableGateContract
{
    public function diskUsage(Userable $user):bool;
}
