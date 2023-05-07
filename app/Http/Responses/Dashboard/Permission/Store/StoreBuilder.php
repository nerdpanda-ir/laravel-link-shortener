<?php

namespace App\Http\Responses\Dashboard\Permission\Store;

use App\Services\ResponseBuilder;
use App\Traits\TranslatorGetterable;
use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Contracts\Translation\Translator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Contracts\Responses\Dashboard\Permission\Store\StoreBuilder as Contract;
class StoreBuilder extends ResponseBuilder implements Contract
{
    use TranslatorGetterable;
    protected Translator $translator;
    public function __construct(Response $response,Translator $translator)
    {
        parent::__construct($response);
        $this->translator = $translator;
    }

    public function build(string $permission): RedirectResponse
    {
        return $this->response->redirectToRoute('dashboard.home')
                    ->with('system.messages.ok', [$okMessage]);
    }
}
