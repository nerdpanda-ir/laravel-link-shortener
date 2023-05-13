<?php

namespace App\Contracts\Redirectors\Permission;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface ViewAllable
{
    public function viewAll():RedirectResponse ;
}
