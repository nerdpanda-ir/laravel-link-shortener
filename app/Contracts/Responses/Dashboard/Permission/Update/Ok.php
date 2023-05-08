<?php

namespace App\Contracts\Responses\Dashboard\Permission\Update;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface Ok
{
    public function build(string $permission):RedirectResponse;
}
