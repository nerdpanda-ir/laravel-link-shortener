<?php

namespace App\Contracts\Services\Commands;

use App\Contracts\LoggerGetterable;
use App\Contracts\Redirectors\Createable as Redirector;
use App\Contracts\Services\ResponseVisitors\SaveAction;
use App\Contracts\TranslatorGetterable;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Foundation\Application;
use Symfony\Component\HttpFoundation\RedirectResponse;

interface CreateLink extends TranslatorGetterable , LoggerGetterable
{
    public function execute(string $original , string $createdAt , ?string $creator = null ):RedirectResponse;
    public function getResponseVisitor():SaveAction;
    public function setResponseVisitor(SaveAction $responseVisitor):self;
    public function getCreatedResponse():callable;
    public function setCreatedResponse(callable $response):self;
    public function getContainer():Application;
    public function getLinkModel():string;
    public function getExceptionHandler():ExceptionHandler;
    public function getRedirector():Redirector;
    public function setRedirector(Redirector $redirector):self;
}
