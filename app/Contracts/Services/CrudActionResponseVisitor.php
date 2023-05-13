<?php

namespace App\Contracts\Services;

use App\Contracts\TranslatorGetterable;
use Symfony\Component\HttpFoundation\Response;

interface CrudActionResponseVisitor extends TranslatorGetterable
{
    public function ok(Response $response , string $item):Response;
    public function fail(Response $response , string $item):Response;
    public function ThrowException(Response $response , string $item ):Response;
}
