<?php

namespace App\Contracts\Services;

use App\Contracts\Services\AbstractCrudableGate\Createable;
use App\Contracts\Services\AbstractCrudableGate\Deleteable;
use App\Contracts\Services\AbstractCrudableGate\Editable;
use App\Contracts\Services\AbstractCrudableGate\Viewallable;

interface AbstractCrudableGate extends Viewallable , Createable , Editable , Deleteable
{

}
