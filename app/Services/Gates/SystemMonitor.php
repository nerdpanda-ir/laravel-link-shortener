<?php

namespace App\Services\Gates;

use App\Contracts\SystemMonitorGateContract as Contract;
use App\Contracts\UserableContract;

class SystemMonitor implements  Contract
{
    public function ramUsage(UserableContract $user): bool
    {
        // TODO: Implement ramUsage() method.
    }

}
