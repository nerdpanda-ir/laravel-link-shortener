<?php

namespace App\Contracts\Redirectors;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface Dashboard
{
    public function redirect():RedirectResponse;
}
