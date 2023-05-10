<?php

namespace App\Traits\Services\Gates;

use App\Traits\Services\Gates\Role\Createable;
use App\Traits\Services\Gates\Role\Deleteable;
use App\Traits\Services\Gates\Role\Editable;
use App\Traits\Services\Gates\Role\ViewAllable;

trait Role
{
    use ViewAllable , Createable , Editable , Deleteable ;
}
