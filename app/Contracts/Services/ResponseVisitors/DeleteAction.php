<?php

namespace App\Contracts\Services\ResponseVisitors;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface DeleteAction extends Okable , ExceptionThrowable
{

    public function  fail(RedirectResponse $response, string $item): RedirectResponse;
}
