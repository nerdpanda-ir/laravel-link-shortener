<?php

namespace App\Contracts\Services;

use Carbon\CarbonInterface;

interface DateService
{
    public function dateStrToCarbon(string $dateStr):CarbonInterface|false ;
    public function date(string $format = 'Y-m-d H:i:s' , int|null $timestamp = null): string | false;
}
