<?php

namespace App\Exceptions;

use Exception;
use App\Contracts\Exceptions\FailCrud as Contract;
class FailCrud extends Exception implements Contract
{

}
