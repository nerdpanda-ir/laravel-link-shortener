<?php

namespace App\Contracts\Services\Gates;
use App\Contracts\GateCreateableContract as Createable;
use App\Contracts\GateEditable as Editable;
use App\Contracts\GateViewAllableContract as Viewallable;
use App\Contracts\Services\Gates\Deleteable as Deleteable;

interface Permission extends
    Viewallable , Createable , Editable , Deleteable
{

}
