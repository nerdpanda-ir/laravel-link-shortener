<?php

namespace App\Contracts\Observers\Logger;

use App\Contracts\Model\Permission;
use Illuminate\Database\Eloquent\Model;

interface Updatedable
{
    public function updated(Model $model): void;
}
