<?php

namespace App\Contracts\Responses\Dashboard\Permission\Delete;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface Fail
{
    public function build(string $permission):RedirectResponse;
}
