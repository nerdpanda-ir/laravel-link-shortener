<?php

namespace App\Contracts\Services;

use App\Contracts\LoggerGetterable;
use App\Contracts\TranslatorGetterable;

interface LoggerMiddleware extends LoggerGetterable , TranslatorGetterable
{

}
