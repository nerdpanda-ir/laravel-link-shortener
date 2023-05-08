<?php

namespace App\Http\Responses\Dashboard\Permission;
use App\Services\ResponseBuilder;
use App\Traits\TranslatorGetterable;
use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Contracts\Translation\Translator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Contracts\Responses\Dashboard\Permission\NotFound as Contract;

class NotFound extends ResponseBuilder implements Contract
{
    use TranslatorGetterable;
    protected Translator $translator;
    public function __construct(Response $response , Translator $translator)
    {
        parent::__construct($response);
        $this->translator = $translator;
    }

    public function build(string $permission): RedirectResponse
    {
        return $this->getResponse()
                        ->redirectToRoute('dashboard.permission.view-all')
                        ->with('system.messages.error',[
                            $this->getTranslator()->get(
                                'messages.not-found.permission', ['permission' => $permission]
                            )
                        ]);
    }
}
