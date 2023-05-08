<?php

namespace App\Contracts\Responses\Dashboard\Permission\Update;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface Fail
{
    // @todo same method detected !!!
    public function build(string $permission,array $inputs):RedirectResponse;
}
