<?php

namespace App\Contracts\Services\Redirector;

use Illuminate\Routing\Redirector;

interface RedirectorGetterable
{
    public function getRedirector():Redirector;
}
