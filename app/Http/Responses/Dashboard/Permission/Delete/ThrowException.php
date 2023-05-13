<?php

namespace App\Http\Responses\Dashboard\Permission\Delete;

use App\Services\ResponseBuilderContainTranslator as ResponseBuilder;
use App\Contracts\Responses\Dashboard\Permission\Delete\ThrowException as Contract;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ThrowException extends ResponseBuilder implements Contract
{
    public function build(string $permission): RedirectResponse
    {
        return $this
                    ->getResponse()
                    ->redirectToRoute('dashboard.permission.view-all')
                    ->with(
                        'system.messages.error' , [
                            $this->getTranslator()->get(
                                'messages.crud.delete.throw_exception',
                                ['item' => 'permission '.$permission ,'date' => date("Y-m-d H:i:s")]
                            )
                        ]
                    );
    }
}
