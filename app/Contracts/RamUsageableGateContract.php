<?php

namespace App\Contracts;

interface RamUsageableGateContract
{
    public function ramUsage(UserableContract $user):bool;
}
