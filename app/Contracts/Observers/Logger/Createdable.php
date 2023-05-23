<?php

namespace App\Contracts\Observers\Logger;

use App\Contracts\Model\Permission;
use Illuminate\Database\Eloquent\Model;

interface Createdable
{
    public function created(Model $model): void;
}
