<?php

namespace App\Contracts\Observers\Permission\Logger;

use App\Contracts\Model\Permission;

interface Createdable
{
    public function created(Permission $permission): void;
}
