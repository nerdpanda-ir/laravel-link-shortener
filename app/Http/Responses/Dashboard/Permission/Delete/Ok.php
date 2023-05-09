<?php

namespace App\Http\Responses\Dashboard\Permission\Delete;

use App\Services\ResponseBuilderContainTranslator as ResponseBuilder;
use App\Contracts\Responses\Dashboard\Permission\Delete\Ok as Contract;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Ok extends ResponseBuilder implements Contract
{
    public function build(string $permission): RedirectResponse
    {
        // @todo should redirect to back if back is view-all !!!
        return $this
                    ->getResponse()
                    ->redirectToRoute('dashboard.permission.view-all')
                    ->with(
                        'system.messages.ok' , [
                            $this->getTranslator()->get(
                                'messages.delete.permission.ok', ['name' => $permission]
                            )
                        ]
                    );
    }
}
