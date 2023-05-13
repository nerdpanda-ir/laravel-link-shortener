<?php

namespace App\Traits\Services;

use Illuminate\Routing\Redirector;

trait RedirectorGetterable
{
    public function getRedirector():Redirector {
        return $this->redirector;
    }
}
