<?php

namespace App\Http\Redirector;
use App\Contracts\Redirectors\User as Contract;
use App\Services\CrudRedirector;
use Symfony\Component\HttpFoundation\RedirectResponse;

class User extends CrudRedirector implements Contract
{
    public function create(array $inputs = []): RedirectResponse
    {
        // TODO: Implement create() method.
    }

    public function edit(string $id, string $name, array $inputs = []): RedirectResponse
    {
        // TODO: Implement edit() method.
    }

    public function viewAll(): RedirectResponse
    {
        return $this->getRedirector()
                    ->route('dashboard.user.view-all');
    }

}
