<?php

namespace App\Contracts\Services\ResponseVisitors;
use App\Contracts\Services\ResponseVisitors\Statuses\ExceptionThrowable;
use App\Contracts\TranslatorGetterable;

interface ShowAction extends ExceptionThrowable , TranslatorGetterable
{

}
