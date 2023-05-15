<?php

namespace App\Traits;

use App\Contracts\Services\DateService;

trait DateServiceGetterable
{
    public function getDateService():DateService {
        return $this->dateService;
    }
}
