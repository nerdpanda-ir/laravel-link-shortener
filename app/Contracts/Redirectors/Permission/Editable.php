<?php

namespace App\Contracts\Redirectors\Permission;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface Editable
{
    public function edit(string $id , string $name , array $inputs = []):RedirectResponse;
}
