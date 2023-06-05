<?php

namespace App\Http\Redirector\Dashboard;

use App\Contracts\Redirectors\Dashboard\Permission as Contract;
use App\Services\CrudRedirector;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Permission extends CrudRedirector implements  Contract
{
    public function viewAll(): RedirectResponse
    {
        return $this->getRedirector()
                    ->route('dashboard.permission.view-all');
    }
    public function create(array $inputs = []): RedirectResponse
    {
        return $this->getRedirector()
                    ->route('dashboard.permission.create')
                    ->withInput($inputs);
    }
    public function edit(string $id, string $name , array $inputs = []): RedirectResponse
    {
        return $this->getRedirector()
                    ->route(
                        'dashboard.permission.edit',
                        ['id'=>$id , 'name'=>$name]
                    )->withInput($inputs);
    }
}
