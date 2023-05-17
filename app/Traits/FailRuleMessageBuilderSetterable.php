<?php

namespace App\Traits;

use App\Contracts\Services\FailRuleMessageBuilder;

trait FailRuleMessageBuilderSetterable
{
    public function setFailMessage(FailRuleMessageBuilder $messageBuilder):void {
        $this->failMessageBuilder = $messageBuilder;
    }
}
