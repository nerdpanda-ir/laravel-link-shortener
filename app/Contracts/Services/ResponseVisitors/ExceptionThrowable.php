<?php

namespace App\Contracts\Services\ResponseVisitors;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

interface ExceptionThrowable
{
    public function throwException(RedirectResponse $response , string $item):RedirectResponse;
}
