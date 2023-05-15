<?php

namespace App\Contracts\Redirectors;

use Symfony\Component\HttpFoundation\RedirectResponse;

interface ViewAllable
{
    public function viewAll():RedirectResponse ;
}
