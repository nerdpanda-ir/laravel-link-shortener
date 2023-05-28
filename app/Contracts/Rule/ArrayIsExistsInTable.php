<?php

namespace App\Contracts\Rule;

use App\Contracts\DatabaseManagerGetterable;
use App\Contracts\DateServiceGetterable;
use App\Contracts\ExceptionHandlerGetterable;
use App\Contracts\FailRuleMessageBuilderable;
use App\Contracts\LoggerGetterable;
use App\Contracts\RequestGetterable;
use App\Contracts\RuleExplodeResponseBuilderable;
use App\Contracts\RuleExplodeResponseBuilderGetterable;
use App\Contracts\Services\ResponseVisitor;
use App\Contracts\TranslatorGetterable;
use Symfony\Component\HttpFoundation\Response;

interface ArrayIsExistsInTable extends  DatabaseManagerGetterable , TranslatorGetterable , LoggerGetterable ,
    ExceptionHandlerGetterable , FailRuleMessageBuilderable , DateServiceGetterable
{
    public function getTable(): string;
    public function setTable(string $table): void;
    public function getColumn(): string;
    public function setColumn(string $column): void;
    public function getExplodeResponse():callable;

    public function setExplodeResponse(callable $response):void;
    public function setExplodeResponseVisitor(ResponseVisitor $responseVisitor):void;
    public function getExplodeResponseVisitor():ResponseVisitor;
}
