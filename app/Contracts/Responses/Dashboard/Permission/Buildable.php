<?php

namespace App\Contracts\Responses\Dashboard\Permission;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface Buildable
{
    public function build(string $permission):RedirectResponse;
}
