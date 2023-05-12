<?php

namespace App\Contracts\Exceptions;

use App\Contracts\SetMessageable;
use App\Contracts\Exceptions\FailCrud\Contextable;

interface FailCrud extends SetMessageable , Contextable
{

}
