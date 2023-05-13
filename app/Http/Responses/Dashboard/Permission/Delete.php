<?php

namespace App\Http\Responses\Dashboard\Permission;
use App\Contracts\Responses\Dashboard\Permission\Delete as Contract;
use App\Services\ResponseBuilder;
use App\Services\ResponseBuilders\DeleteAction;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Delete extends DeleteAction implements Contract
{
    public function ok(): RedirectResponse
    {
    }

    public function fail(): RedirectResponse
    {
        return $this->getResponse()
                    ->redirectToRoute('dashboard.permission.view-all');
    }

    public function throwException(): RedirectResponse
    {
        // TODO: Implement throwException() method.
    }


}
