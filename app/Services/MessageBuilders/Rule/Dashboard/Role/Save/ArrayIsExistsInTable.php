<?php

namespace App\Services\MessageBuilders\Rule\Dashboard\Role\Save;

use App\Services\FailRuleMessageBuilder;
use Illuminate\Support\Collection;
use App\Contracts\Services\MessageBuilders\Rule\Dashboard\Role\Save\ArrayIsExistsInTable as Contract;
class ArrayIsExistsInTable extends FailRuleMessageBuilder implements Contract
{
    public function build(?Collection $payload = null): string
    {
        dd("here");
    }
}
