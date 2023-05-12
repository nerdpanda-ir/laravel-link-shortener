<?php

namespace App\Traits\Exceptions;

use App\Traits\Exceptions\FailCrud\Contextable;
use App\Traits\SetMessageable;

trait FailCrud
{
    use Contextable , SetMessageable;
}
