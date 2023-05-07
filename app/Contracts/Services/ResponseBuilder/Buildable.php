<?php

namespace App\Contracts\Services\ResponseBuilder;

use Symfony\Component\HttpFoundation\Response;

interface Buildable
{
    public function build(...$arguments):Response;
}
