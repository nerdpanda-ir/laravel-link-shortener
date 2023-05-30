<?php

namespace App\Contracts\Services;

interface UserUpdateStrategyFactory
{
    public function make():UserUpdateStrategy;
}
