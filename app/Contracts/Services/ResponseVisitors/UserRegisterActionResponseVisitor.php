<?php

namespace App\Contracts\Services\ResponseVisitors;

use App\Contracts\Services\ResponseVisitor;
use App\Contracts\TranslatorGetterable;
use Symfony\Component\HttpFoundation\RedirectResponse;

interface UserRegisterActionResponseVisitor extends ResponseVisitor , TranslatorGetterable
{
    public function setRedirectResponse(RedirectResponse $response):void;
    public function getRedirectResponse():RedirectResponse;
    public function setUserfullName(string $fullName):void;
    public function getUserFullName():string;
    public function ok():RedirectResponse;
    public function fail():RedirectResponse;
    public function ThrowException(string $date):RedirectResponse;

}
