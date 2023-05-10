<?php

namespace App\Services\Gates;

use App\Contracts\Model\Userable;
use App\Contracts\Services\Gates\SystemMonitor as Contract;

class SystemMonitor implements  Contract
{
    public function ramUsage(Userable $user): bool
    {
        // TODO: Implement ramUsage() method.
    }

    public function diskUsage(Userable $user): bool
    {
        // TODO: Implement diskUsage() method.
    }

}
