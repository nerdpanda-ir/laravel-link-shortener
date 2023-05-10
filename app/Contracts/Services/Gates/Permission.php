<?php

namespace App\Contracts\Services\Gates;
use App\Contracts\GateCreateableContract as Createable;
use App\Contracts\GateEditable as Editable;

interface Permission extends
    Viewallable , Createable , Editable , Deleteable
{

}
