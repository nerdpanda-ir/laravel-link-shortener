<?php

namespace App\Contracts\Responses\Dashboard\Permission;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface Delete
{
    public function ok():RedirectResponse;
    public function fail():RedirectResponse;
    public function throwException():RedirectResponse;
}
