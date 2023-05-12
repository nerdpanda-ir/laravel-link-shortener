<?php

namespace App\Exceptions;

use Exception;
use App\Contracts\Exceptions\FailCrud as Contract;
use App\Traits\Exceptions\FailCrud as FailCrudTrait;
class FailCrud extends Exception implements Contract
{
    use FailCrudTrait;
    protected array $context = [];
}
