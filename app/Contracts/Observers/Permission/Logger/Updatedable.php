<?php

namespace App\Contracts\Observers\Permission\Logger;

use App\Contracts\Model\Permission;

interface Updatedable
{
    public function updated(Permission $permission): void;
}
