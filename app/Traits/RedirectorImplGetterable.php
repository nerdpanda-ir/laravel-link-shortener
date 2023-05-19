<?php

namespace App\Traits;

use App\Contracts\Services\Redirector;

trait RedirectorImplGetterable
{
    public function getRedirector():Redirector {
        return $this->redirector;
    }
}
