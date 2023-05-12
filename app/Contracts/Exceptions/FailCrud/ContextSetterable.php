<?php

namespace App\Contracts\Exceptions\FailCrud;

interface ContextSetterable
{
    public function setContext(array $context):void;
}
