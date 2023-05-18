<?php

namespace App\Contracts\Services;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface SaveRoleStrategy
{
    public function save():RedirectResponse;
}
