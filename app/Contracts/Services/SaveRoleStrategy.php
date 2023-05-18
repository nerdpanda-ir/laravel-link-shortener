<?php

namespace App\Contracts\Services;

use App\Contracts\AuthManagerGetterable;
use App\Contracts\DateServiceGetterable;
use App\Contracts\ExceptionHandlerGetterable;
use App\Contracts\FailCrudExceptionGetterable;
use App\Contracts\LoggerGetterable;
use App\Contracts\RequestGetterable;
use App\Contracts\ResponseVisitorGetterable;
use App\Contracts\RoleModelGetterable;
use App\Contracts\Services\Redirector\RedirectorGetterable;
use App\Contracts\TranslatorGetterable;
use Symfony\Component\HttpFoundation\RedirectResponse;

interface SaveRoleStrategy extends LoggerGetterable , TranslatorGetterable , RequestGetterable ,
    ExceptionHandlerGetterable , ResponseVisitorGetterable , RedirectorGetterable , RoleModelGetterable ,
    FailCrudExceptionGetterable , AuthManagerGetterable , DateServiceGetterable
{
    public function save():RedirectResponse;
}
