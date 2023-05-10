<?php

namespace App\Traits\Services\Gates;

use App\Traits\Services\Gates\Permission\Createable;
use App\Traits\Services\Gates\Permission\Deleteable;
use App\Traits\Services\Gates\Permission\Editable;
use App\Traits\Services\Gates\Permission\ViewAllable;

trait Permission
{
    use ViewAllable , Createable , Deleteable , Editable ;
}
