<?php

namespace App\Contracts\Services\Gates\SystemMonitor;

use App\Contracts\Model\Userable;

interface DiskUsageable
{
    public function diskUsage(Userable $user):bool;
}
