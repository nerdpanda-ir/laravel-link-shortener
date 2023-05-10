<?php

namespace App\Contracts\Observers\Permission\Logger;

use App\Contracts\Model\Permission;

interface Deletedable
{
    public function deleted(Permission $permission): void;
}
