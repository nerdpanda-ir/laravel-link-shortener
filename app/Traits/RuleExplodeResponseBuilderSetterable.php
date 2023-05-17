<?php

namespace App\Traits;

use App\Contracts\RuleExplodeResponseBuilder;

trait RuleExplodeResponseBuilderSetterable
{
    public function setExplodeResponseBuilder(RuleExplodeResponseBuilder $responseBuilder):void {
        $this->explodeResponseBuilder = $responseBuilder;
    }
}
