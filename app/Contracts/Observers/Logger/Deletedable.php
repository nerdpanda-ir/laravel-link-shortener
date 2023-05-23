<?php

namespace App\Contracts\Observers\Logger;

use App\Contracts\Model\Permission;

interface Deletedable
{
    public function deleted(Permission $permission): void;
}
