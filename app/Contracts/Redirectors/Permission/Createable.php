<?php

namespace App\Contracts\Redirectors\Permission;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface Createable
{
    public function create():RedirectResponse;
}
