<?php

namespace App\Contracts\Services\ResponseBuilder;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Collection;

interface Buildable
{
    public function build(Collection $collection):Response;
}
