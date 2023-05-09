<?php

namespace App\Contracts\Responses\Dashboard\Permission\Delete;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface ThrowException
{
    public function build(string $permission):RedirectResponse;
}
