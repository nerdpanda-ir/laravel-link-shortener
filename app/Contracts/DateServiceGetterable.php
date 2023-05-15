<?php

namespace App\Contracts;

use App\Contracts\Services\DateService;

interface DateServiceGetterable
{
    public function getDateService():DateService;
}
