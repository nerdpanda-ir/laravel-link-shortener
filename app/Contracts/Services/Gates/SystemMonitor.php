<?php

namespace App\Contracts\Services\Gates;

use App\Contracts\Services\Gates\SystemMonitor\DiskUsageable;
use App\Contracts\Services\Gates\SystemMonitor\RamUsageable;

interface SystemMonitor extends
    RamUsageable , DiskUsageable
{

}
