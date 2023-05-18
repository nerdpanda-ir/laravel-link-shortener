<?php

namespace App\Contracts\Services\ResponseVisitors;

use App\Contracts\Services\ResponseVisitor;
use App\Contracts\Services\ResponseVisitors\Statuses\ExceptionThrowable;

interface ViewAllAction extends  ResponseVisitor , ExceptionThrowable
{

}
