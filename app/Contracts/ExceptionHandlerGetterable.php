<?php

namespace App\Contracts;

use Illuminate\Contracts\Debug\ExceptionHandler;

interface ExceptionHandlerGetterable
{
    public function getExceptionHandler():ExceptionHandler;
}
