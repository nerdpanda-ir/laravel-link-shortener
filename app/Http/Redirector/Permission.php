<?php

namespace App\Http\Redirector;

use App\Services\Redirector;
use App\Contracts\Redirectors\Permission as Contract;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Permission extends Redirector implements  Contract
{
    public function viewAll(): RedirectResponse
    {
        return $this->getRedirector()
                    ->route('dashboard.permission.view-all');
    }
    public function create(): RedirectResponse
    {
        return $this->getRedirector()
                    ->route('dashboard.permission.create');
    }
}
