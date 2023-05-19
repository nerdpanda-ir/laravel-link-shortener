<?php

namespace App\Contracts;

use App\Contracts\Services\Redirector;

interface RedirectorImplGetterable
{
    public function getRedirector():Redirector;
}
