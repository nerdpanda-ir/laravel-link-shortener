<?php

namespace App\Contracts\Services;

use Illuminate\Support\Collection;

interface MessageBuilder
{
    public function build(null|Collection $payload = null):string;
}
