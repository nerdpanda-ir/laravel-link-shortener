<?php

namespace App\Contracts\Responses\Dashboard\Permission;

use App\Contracts\TranslatorGetterable;
use Symfony\Component\HttpFoundation\RedirectResponse;

interface NotFoundPermission extends TranslatorGetterable
{
    public function build(string $permission):RedirectResponse;
}
