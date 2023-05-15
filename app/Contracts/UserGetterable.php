<?php

namespace App\Contracts;

use App\Contracts\Model\Userable;

interface UserGetterable
{
    public function getUser():Userable;
}
