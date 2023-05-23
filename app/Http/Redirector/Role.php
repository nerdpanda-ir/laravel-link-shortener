<?php

namespace App\Http\Redirector;
use App\Contracts\Redirectors\Role as Contract;
use App\Services\CrudRedirector;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Role extends CrudRedirector implements Contract
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

    public function edit(string $id, string $name, array $inputs = []): RedirectResponse
    {
        return $this->getRedirector()
                    ->route('dashboard.role.edit',[$id,$name])
                    ->withInput($inputs);
    }

}
