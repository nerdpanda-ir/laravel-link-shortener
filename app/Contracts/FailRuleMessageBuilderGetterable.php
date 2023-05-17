<?php

namespace App\Contracts;

use App\Contracts\Services\FailRuleMessageBuilder;

interface FailRuleMessageBuilderGetterable
{
    public function getFailMessage():FailRuleMessageBuilder;
}
