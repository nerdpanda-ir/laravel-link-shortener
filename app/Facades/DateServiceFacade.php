<?php

namespace App\Facades;

use App\Contracts\Services\DateService;
use Illuminate\Support\Facades\Facade;

class DateServiceFacade extends Facade
{
    protected static function getFacadeAccessor():string
    {
        return 'contract.service.dateService';
    }
}
