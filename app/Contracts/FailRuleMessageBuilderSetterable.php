<?php

namespace App\Contracts;

use App\Contracts\Services\FailRuleMessageBuilder;

interface FailRuleMessageBuilderSetterable
{

    /**
     * @param FailRuleMessageBuilder $messageBuilder
     * @return void
     */
    public function setFailMessage(FailRuleMessageBuilder $messageBuilder):void;
}
