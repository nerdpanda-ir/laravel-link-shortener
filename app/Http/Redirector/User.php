<?php

namespace App\Http\Redirector;
use App\Contracts\Redirectors\User as Contract;
use App\Services\CrudRedirector;
use Symfony\Component\HttpFoundation\RedirectResponse;

class User extends CrudRedirector implements Contract
{
    public function create(array $inputs = []): RedirectResponse
    {
        return $this->getRedirector()->route('dashboard.user.create')->withInput($inputs);
    }

    public function edit(string $id, string $name, array $inputs = []): RedirectResponse
    {
        return $this->getRedirector()->route('dashboard.user.edit',[$id,$name])->withInput($inputs);
    }

    public function viewAll(): RedirectResponse
    {
        return $this->getRedirector()
                    ->route('dashboard.user.view-all');
    }

}
