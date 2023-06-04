<?php

namespace App\Contracts\Redirectors;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface Link extends Createable
{
    public function show(string $summary):RedirectResponse;
}
