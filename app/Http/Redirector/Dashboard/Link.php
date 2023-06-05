<?php

namespace App\Http\Redirector\Dashboard;
use App\Contracts\Redirectors\Dashboard\Link as Contract;
use App\Services\Redirector;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Link extends Redirector implements Contract
{
    public function create(array $inputs = []): RedirectResponse
    {
        return $this->getRedirector()
                    ->route('dashboard.link.create')
                    ->withInput($inputs);
    }

    public function viewAll(): RedirectResponse
    {
        return $this->getRedirector()->route('dashboard.link.view-all');
    }

}
