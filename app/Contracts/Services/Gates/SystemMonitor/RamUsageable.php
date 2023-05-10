<?php

namespace App\Contracts\Services\Gates\SystemMonitor;

use App\Contracts\Model\Userable;

interface RamUsageable
{
    public function ramUsage(Userable $user):bool;
}
