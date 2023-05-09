<?php

namespace App\Exceptions;

use App\Traits\SetMessageable;
use Exception;
use App\Contracts\Exceptions\FailDelete as Contract;
class FailDelete extends Exception implements Contract
{
    use SetMessageable;
}
