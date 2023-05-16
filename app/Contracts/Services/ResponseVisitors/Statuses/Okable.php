<?php

namespace App\Contracts\Services\ResponseVisitors\Statuses;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface Okable
{
    public function ok(RedirectResponse $response, string $item): RedirectResponse;
}
