<?php

namespace App\Contracts\Redirectors;

use App\Contracts\Redirectors\Permission\Createable;

interface Permission extends ViewAllable , Editable , Createable
{

}
