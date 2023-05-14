<?php

namespace App\Contracts\Services\ResponseVisitors;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface Failable
{
    public function fail(RedirectResponse $response, string $item): RedirectResponse;
}
