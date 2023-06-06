<?php

namespace App\Http\Redirector\Dashboard;

use App\Services\Redirector;
use App\Contracts\Redirectors\Dashboard\AdminLink as Contract;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminLink extends Redirector implements Contract
{
    public function viewAll(): RedirectResponse
    {
        return $this->getRedirector()
                    ->route('dashboard.admin_link.view-all');
    }
    public function edit(string $id, string $name, array $inputs = []): RedirectResponse
    {
        $redirectResponse = $this->getRedirector()
                                 ->route('dashboard.admin_link.edit',[$id])
                                 ->withInput($inputs);
        $redirectResponse->setTargetUrl(
            $redirectResponse->getTargetUrl().'?link='.$name
        );
        return $redirectResponse;
    }
}
