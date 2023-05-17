<?php

namespace App\Contracts;

use App\Contracts\Services\FailRuleMessageBuilder;

interface FailRuleMessageBuilderSetterable
{
    public function setFailMessage(FailRuleMessageBuilder $messageBuilder):void;
}
