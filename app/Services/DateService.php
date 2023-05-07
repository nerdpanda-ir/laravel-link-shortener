<?php

namespace App\Services;

use App\Contracts\Services\DateService as Contract;
use Carbon\CarbonInterface;
use Illuminate\Support\Carbon;

class DateService implements Contract
{
    public function dateStrToCarbon(string $dateStr): CarbonInterface|false
    {
        $dateStrTimestamp = strtotime($dateStr);
        if (!$dateStrTimestamp)
            return false;
        return Carbon::createFromTimestamp($dateStrTimestamp);
    }
}
