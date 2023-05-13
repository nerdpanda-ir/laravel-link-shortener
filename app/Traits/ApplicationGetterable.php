<?php

namespace App\Traits;

use Illuminate\Contracts\Foundation\Application;

trait ApplicationGetterable
{
    public function getApplication():Application {
        return $this->container;
    }
}
