<?php

namespace App\Traits;

use App\Contracts\Services\FailRuleMessageBuilder;

trait FailRuleMessageBuilderGetterable
{
    public function getFailMessage():FailRuleMessageBuilder {
        return $this->failMessageBuilder;
    }
}
