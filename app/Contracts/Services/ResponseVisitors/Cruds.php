<?php

namespace App\Contracts\Services\ResponseVisitors;

use App\Contracts\TranslatorGetterable;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

interface Cruds extends TranslatorGetterable
{
    public function ok(RedirectResponse $response , string $item):Response;
    public function fail(RedirectResponse $response , string $item):Response;
    public function ThrowException(RedirectResponse $response , string $item ):Response;
}
