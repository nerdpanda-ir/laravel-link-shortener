<?php

namespace App\Contracts\Responses\Dashboard\Permission\Edit;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface ExceptionThrow
{
    public function build(string $permission):RedirectResponse;
}
