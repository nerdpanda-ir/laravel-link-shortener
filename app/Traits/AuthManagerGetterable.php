<?php

namespace App\Traits;

use Illuminate\Contracts\Auth\Factory;

trait AuthManagerGetterable
{
    public function getAuthManager():Factory {
        return $this->auth;
    }
}
