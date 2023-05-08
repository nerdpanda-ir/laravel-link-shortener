<?php

namespace App\Exceptions;

use App\Traits\SetMessageable;
use Exception;
use App\Contracts\Exceptions\FailStore as Contract;
class FailStoreException extends Exception implements Contract
{
    use SetMessageable;
}
