<?php

namespace App\Contracts\Services;

use Symfony\Component\HttpFoundation\Response;

interface CrudActionResponseVisitor
{
    public function ok(Response $response):Response;
    public function fail(Response $response):Response;
    public function ThrowException(Response $response):Response;
}