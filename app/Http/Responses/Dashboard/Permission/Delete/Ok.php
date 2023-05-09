<?php

namespace App\Http\Responses\Dashboard\Permission\Delete;

use App\Services\ResponseBuilderContainTranslator as ResponseBuilder;
use App\Contracts\Responses\Dashboard\Permission\Delete\Ok as Contract;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Ok extends ResponseBuilder implements Contract
{
    public function build(string $permission): RedirectResponse
    {
        return $this
                    ->getResponse()
                    ->redirectToRoute('dashboard.permission.view-all')
                    ->with(
                        'system.messages.error' , [
                            $this->getTranslator()->get(
                                'messages.delete.permission.ok', ['name' => $permission]
                            )
                        ]
                    );
    }
}
