<?php

namespace App\Contracts\Services\ResponseVisitors;

use App\Contracts\Services\ResponseVisitor;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

interface NotFound extends ResponseVisitor
{
    public function visit(Response $response , string $item):RedirectResponse;
}
