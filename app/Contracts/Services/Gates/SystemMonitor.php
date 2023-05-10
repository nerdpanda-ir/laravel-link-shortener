<?php

namespace App\Contracts\Services\Gates;

use App\Contracts\DiskUsageableGateContract;
use App\Contracts\RamUsageableGateContract;

interface SystemMonitor extends
    RamUsageableGateContract , DiskUsageableGateContract
{

}
