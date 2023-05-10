<?php

namespace App\Contracts\Services\TranslateKeyGetter;

interface ModelLoggable
{
    public function modelLog(string $action , string $model):string;
}
