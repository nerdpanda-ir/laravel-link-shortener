<?php

namespace App\Traits;

use App\Contracts\Model\Userable;

trait UserGetterable
{
    public function getUser():Userable {
        return $this->user;
    }
}
