<?php

namespace App\Facades;

use App\Contracts\Services\DateService;
use Carbon\CarbonInterface;
use Illuminate\Support\Facades\Facade;


/**
 * @see DateService
 */
class DateServiceFacade extends Facade
{
    protected static function getFacadeAccessor():string
    {
        return 'contract.service.dateService';
    }
}
