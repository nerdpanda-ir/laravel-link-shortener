<?php

namespace App\Exceptions;

use Exception;
use App\Contracts\Exceptions\FailStore as Contract;
class FailStoreException extends Exception implements Contract
{
}
