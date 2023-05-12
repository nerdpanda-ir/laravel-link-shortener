<?php

namespace App\Traits\Exceptions\FailCrud;

trait ContextSetterable
{
    public function setContext(array $context):void {
        $this->context = $context;
    }
}
