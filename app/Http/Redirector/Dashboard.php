<?php

namespace App\Http\Redirector;
use App\Contracts\Redirectors\Dashboard as Contract;
use App\Services\Redirector;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Dashboard extends Redirector implements Contract
{
    public function redirect(): RedirectResponse
    {
        return $this->getRedirector()->route('dashboard.home');
    }
}
