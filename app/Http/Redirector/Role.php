<?php

namespace App\Http\Redirector;
use App\Contracts\Redirectors\Role as Contract;
use App\Services\Redirector;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Role extends Redirector implements Contract
{
    public function viewAll(): RedirectResponse
    {
        return $this->getRedirector()->route('dashboard.role.view-all');
    }
    public function create(array $inputs = []): RedirectResponse
    {
        return $this->getRedirector()
                    ->route('dashboard.role.create')
                    ->withInput($inputs);
    }
}
