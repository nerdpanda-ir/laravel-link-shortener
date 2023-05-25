<?php

namespace App\Services\MessageBuilders\Rule\Dashboard\User;
use App\Contracts\Services\MessageBuilders\Rule\Dashboard\User\ArrayIsExistsInTable as Contract;
use App\Services\FailRuleMessageBuilder;
use Illuminate\Support\Collection;

class ArrayIsExistsInTable extends FailRuleMessageBuilder implements Contract
{
    public function build(?Collection $payload = null): string
    {
        return $this->getTranslator()->get(
            'messages.validations.user.array_is_exists_in_table', $payload->toArray()
        );
    }

}
