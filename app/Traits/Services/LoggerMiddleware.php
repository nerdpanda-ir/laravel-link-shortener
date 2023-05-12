<?php

namespace App\Traits\Services;

use App\Traits\LoggerGetterable;
use App\Traits\TranslatorGetterable;

trait LoggerMiddleware
{
    use TranslatorGetterable , LoggerGetterable ;
}
