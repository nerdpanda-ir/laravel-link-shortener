<?php

namespace App\Contracts\Services;

use App\Contracts\Redirectors\Createable;
use App\Contracts\Redirectors\Editable;
use App\Contracts\Redirectors\ViewAllable;

interface CrudRedirector extends ViewAllable , Editable , Createable
{

}
