<?php

namespace App\Contracts\Services\ResponseVisitors\Statuses;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface Failable
{
    public function fail(RedirectResponse $response, string $item): RedirectResponse;
}
