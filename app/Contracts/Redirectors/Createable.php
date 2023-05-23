<?php

namespace App\Contracts\Redirectors;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface Createable
{
    public function create(array $inputs = []):RedirectResponse;
}
