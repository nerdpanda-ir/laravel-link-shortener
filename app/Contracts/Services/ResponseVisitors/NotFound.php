<?php

namespace App\Contracts\Services\ResponseVisitors;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

interface NotFound
{
    public function visit(Response $response , string $item):RedirectResponse;
}
