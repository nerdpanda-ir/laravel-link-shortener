<?php

namespace App\Traits\Services\Gates;

use App\Traits\Services\Gates\User\Createable;
use App\Traits\Services\Gates\User\Deleteable;
use App\Traits\Services\Gates\User\Editable;
use App\Traits\Services\Gates\User\ViewAllable;

trait User
{
    use ViewAllable , Createable , Editable , Deleteable ;
}
