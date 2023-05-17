<?php

namespace App\Traits;

use Illuminate\Contracts\Debug\ExceptionHandler;

trait ExceptionHandlerGetterable
{
    public function getExceptionHandler():ExceptionHandler {
        return $this->exceptionHandler;
    }
}
