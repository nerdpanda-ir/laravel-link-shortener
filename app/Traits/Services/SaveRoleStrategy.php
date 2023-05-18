<?php

namespace App\Traits\Services;

use App\Traits\AuthManagerGetterable;
use App\Traits\DateServiceGetterable;
use App\Traits\ExceptionHandlerGetterable;
use App\Traits\FailCrudExceptionGetterable;
use App\Traits\LoggerGetterable;
use App\Traits\RequestGetterable;
use App\Traits\ResponseVisitorGetterable;
use App\Traits\RoleModelGetterable;
use App\Traits\TranslatorGetterable;

trait SaveRoleStrategy
{
    use LoggerGetterable , TranslatorGetterable , RequestGetterable , ExceptionHandlerGetterable ;
    use ResponseVisitorGetterable , RedirectorGetterable , FailCrudExceptionGetterable , DateServiceGetterable;
    use AuthManagerGetterable , RoleModelGetterable ;
}
