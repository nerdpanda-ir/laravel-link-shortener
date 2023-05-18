<?php

namespace App\Contracts;

use App\Contracts\Exceptions\FailCrud;

interface FailCrudExceptionGetterable
{
    public function getFailCrudException():FailCrud;
}
