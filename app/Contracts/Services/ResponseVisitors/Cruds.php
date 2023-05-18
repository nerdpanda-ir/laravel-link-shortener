<?php

namespace App\Contracts\Services\ResponseVisitors;

use App\Contracts\Services\ResponseVisitor;
use App\Contracts\Services\ResponseVisitors\Statuses\ExceptionThrowable;
use App\Contracts\Services\ResponseVisitors\Statuses\Failable;
use App\Contracts\Services\ResponseVisitors\Statuses\Okable;
use App\Contracts\TranslatorGetterable;

interface Cruds extends ResponseVisitor , TranslatorGetterable , Okable , Failable , ExceptionThrowable
{

}
