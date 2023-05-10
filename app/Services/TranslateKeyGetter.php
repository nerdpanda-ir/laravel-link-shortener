<?php

namespace App\Services;
use App\Contracts\Services\TranslateKeyGetter as Contract;
class TranslateKeyGetter implements Contract
{
    public function modelLog(string $action, string $model , string $status): string
    {
        return "messages.log.$action.$model.$status";
    }
}
