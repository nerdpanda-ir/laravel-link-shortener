<?php

namespace App\Contracts;

interface DiskUsageableGateContract
{
    public function diskUsage(UserableContract $user):bool;
}
