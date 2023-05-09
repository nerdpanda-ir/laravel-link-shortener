<?php

namespace App\Http\Responses\Dashboard\Permission\Update;
use App\Services\ResponseBuilderContainTranslator as ResponseBuilder;
use App\Contracts\Responses\Dashboard\Permission\Update\Fail as Contract;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Fail extends ResponseBuilder implements Contract
{
    public function build( string $id , string $permission, array $inputs): RedirectResponse
    {
        return $this->getResponse()
                    ->redirectToRoute('dashboard.permission.edit',[$id,$permission])
                    ->withInput($inputs)
                    ->with('system.messages.error',[
                        $this->getTranslator()->get(
                            'messages.update.permission.fail', ['permission' => $permission]
                        )
                    ]);
    }
}
