<?php

namespace App\Contracts\Observers\Logger;

use App\Contracts\Model\Permission;

interface Updatedable
{
    public function updated(Permission $permission): void;
}
