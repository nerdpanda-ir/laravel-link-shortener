<?php

namespace App\Exceptions;

use Exception;
use App\Contracts\Exceptions\FailUpdate as Contract;
use App\Traits\SetMessageable;
class FailUpdate extends Exception implements Contract
{
    use SetMessageable;
}
