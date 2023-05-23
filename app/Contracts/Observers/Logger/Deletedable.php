<?php

namespace App\Contracts\Observers\Logger;

use App\Contracts\Model\Permission;
use Illuminate\Database\Eloquent\Model;

interface Deletedable
{
    public function deleted(Model $model): void;
}
