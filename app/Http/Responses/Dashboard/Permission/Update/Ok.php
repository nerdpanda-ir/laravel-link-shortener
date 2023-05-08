<?php

namespace App\Http\Responses\Dashboard\Permission\Update;
use App\Services\ResponseBuilderContainTranslator as ResponseBuilder;
use App\Contracts\Responses\Dashboard\Permission\Update\Ok as Contract;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Ok extends ResponseBuilder implements Contract
{
    public function build(string $permission): RedirectResponse
    {
        return $this
                    ->response
                    ->redirectToRoute('dashboard.permission.view-all')
                    ->with('system.messages.ok',[
                        $this->translator->get(
                            'messages.log.update.permission.ok', ['Permission' => $permission]
                        )
                    ]);
    }
}
