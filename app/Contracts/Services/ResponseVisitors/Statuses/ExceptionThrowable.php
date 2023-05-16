<?php

namespace App\Contracts\Services\ResponseVisitors\Statuses;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface ExceptionThrowable
{
    public function throwException(RedirectResponse $response , string $item):RedirectResponse;
}
