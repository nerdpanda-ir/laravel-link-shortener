<?php

namespace App\Http\Redirector;
use App\Contracts\Redirectors\Home as Contract;
use App\Services\Redirector;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Home extends Redirector implements Contract
{
    public function redirect(): RedirectResponse
    {
        return $this->getRedirector()->route('home');
    }
}
