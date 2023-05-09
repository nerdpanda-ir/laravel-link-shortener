<?php

namespace App\Http\Responses\Dashboard\Permission\Delete;
use App\Contracts\Responses\Dashboard\Permission\Delete\Fail as Contract ;
use App\Services\ResponseBuilderContainTranslator as ResponseBuilder;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Fail extends ResponseBuilder implements Contract
{
    public function build(string $permission): RedirectResponse
    {
        return $this
                    ->getResponse()
                    ->redirectToRoute('dashboard.permission.view-all')
                    ->with('system.messages.error',[
                        $this->getTranslator()->get(
                            'messages.delete.permission.fail', ['name' => $permission]
                        )
                    ]);
    }
}
