<?php

namespace App\Contracts;

interface SystemMonitorGateContract
{
    public function ramUsage(UserableContract $user):bool;
}
