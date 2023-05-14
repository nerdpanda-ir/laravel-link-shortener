<?php

namespace App\Contracts\Redirectors\Permission;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface Createable
{
    public function create(array $inputs = []):RedirectResponse;
}
