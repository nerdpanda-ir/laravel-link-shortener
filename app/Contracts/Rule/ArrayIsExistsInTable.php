<?php

namespace App\Contracts\Rule;

use App\Contracts\DatabaseManagerGetterable;
use App\Contracts\DateServiceGetterable;
use App\Contracts\ExceptionHandlerGetterable;
use App\Contracts\LoggerGetterable;
use App\Contracts\RuleExplodeResponseBuilderable;
use App\Contracts\RuleExplodeResponseBuilderGetterable;
use App\Contracts\TranslatorGetterable;

interface ArrayIsExistsInTable extends  DatabaseManagerGetterable , TranslatorGetterable , LoggerGetterable ,
    ExceptionHandlerGetterable , DateServiceGetterable , RuleExplodeResponseBuilderable
{
    public function getTable(): string;
    public function setTable(string $table): void;
    public function getColumn(): string;
    public function setColumn(string $column): void;
}
