<?php

namespace App\Contracts\Services;

use App\Contracts\Services\AbstractCrudableGate\ViewAllable;
use App\Contracts\Services\AbstractCrudableGate\Createable;
use App\Contracts\Services\AbstractCrudableGate\Editable;
use App\Contracts\Services\AbstractCrudableGate\Deleteable;

interface AbstractCrudableGate extends Viewallable , Createable , Editable , Deleteable
{

}
