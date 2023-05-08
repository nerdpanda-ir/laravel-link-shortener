<?php

namespace App\Exceptions;

use Exception;
use App\Contracts\Exceptions\FailUpdate as Contract;
class FailUpdate extends Exception implements Contract
{
    //
}
