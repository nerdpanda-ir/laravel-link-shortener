<?php

namespace App\Contracts;

interface SystemMonitorGateContract extends
    RamUsageableGateContract , DiskUsageableGateContract
{

}
