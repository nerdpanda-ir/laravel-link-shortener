<?php

namespace App\Contracts\Observers\Logger;

use App\Contracts\Model\Permission;

interface Createdable
{
    public function created(Permission $permission): void;
}
