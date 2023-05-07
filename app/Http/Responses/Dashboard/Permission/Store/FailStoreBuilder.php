<?php

namespace App\Http\Responses\Dashboard\Permission\Store;
use App\Contracts\Responses\Dashboard\Permission\Store\FailStoreBuilder as Contract;
use App\Services\ResponseBuilder;
use Symfony\Component\HttpFoundation\RedirectResponse;

class FailStoreBuilder extends ResponseBuilder implements Contract
{
    public function build(array $inputs, string $errorMessage): RedirectResponse
    {
        return $this->getResponse()->redirectToRoute('dashboard.permission.create')
                ->withInput($inputs)
                ->with('system.messages.error',[$errorMessage]);
    }
}
