<?php

namespace App\Contracts\Services;

use Carbon\CarbonInterface;

interface DateService
{
    public function dateStrToCarbon(string $dateStr):CarbonInterface|false ;
}
