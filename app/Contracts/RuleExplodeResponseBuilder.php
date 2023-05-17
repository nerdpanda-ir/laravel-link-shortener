<?php

namespace App\Contracts;

use App\Contracts\Services\ResponseBuilderContainTranslator;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

interface RuleExplodeResponseBuilder
{
    public function Build(Collection|null $arguments = null):Response;
}
