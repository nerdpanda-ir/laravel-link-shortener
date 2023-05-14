<?php

namespace App\Contracts\Services\ResponseVisitors;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface DeleteAction extends ExceptionThrowable
{
    public function ok(RedirectResponse $response, string $item): RedirectResponse;
    public function  fail(RedirectResponse $response, string $item): RedirectResponse;
}
