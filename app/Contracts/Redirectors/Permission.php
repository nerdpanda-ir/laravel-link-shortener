<?php

namespace App\Contracts\Redirectors;

use App\Contracts\Redirectors\Permission\Createable;
use App\Contracts\Redirectors\Permission\Editable;
use App\Contracts\Redirectors\Permission\ViewAllable;

interface Permission extends ViewAllable , Editable , Createable
{

}
