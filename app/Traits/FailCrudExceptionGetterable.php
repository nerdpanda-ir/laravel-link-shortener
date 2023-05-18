<?php

namespace App\Traits;

use App\Contracts\Exceptions\FailCrud;

trait FailCrudExceptionGetterable
{
    public function getFailCrudException():FailCrud {
        return $this->failCrudException;
    }
}
