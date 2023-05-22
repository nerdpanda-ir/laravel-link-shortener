<?php

namespace App\Contracts\Services\ResponseVisitors\Rule;

use App\Contracts\Services\ResponseVisitor;
use App\Contracts\TranslatorGetterable;
use Symfony\Component\HttpFoundation\Response;

interface ExplodeArrayExistsInTable extends ResponseVisitor , TranslatorGetterable
{
    public function visit(Response $response , string $date , string $attribute):Response;
}
