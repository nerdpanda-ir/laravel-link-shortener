<?php

namespace App\Contracts\Services\ResponseVisitors;

use App\Contracts\Services\ResponseVisitors\Statuses\ExceptionThrowable;
use App\Contracts\Services\ResponseVisitor ;
interface CreateAction extends ResponseVisitor , ExceptionThrowable
{

}
