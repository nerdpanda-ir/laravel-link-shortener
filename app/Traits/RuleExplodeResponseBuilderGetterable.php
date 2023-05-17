<?php

namespace App\Traits;

use App\Contracts\RuleExplodeResponseBuilder;

trait RuleExplodeResponseBuilderGetterable
{
    public function getExplodeResponseBuilder():RuleExplodeResponseBuilder {
        return $this->ExplodeResponseBuilder;
    }
}
