<?php

namespace App\Contracts;

use Illuminate\Contracts\Auth\Factory;

interface AuthManagerGetterable
{
    public function getAuthManager():Factory;
}
