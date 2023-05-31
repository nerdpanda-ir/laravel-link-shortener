<?php

namespace App\Contracts\Redirectors;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface Home
{
    public function redirect():RedirectResponse;
}
