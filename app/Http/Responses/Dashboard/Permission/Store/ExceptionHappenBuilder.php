<?php

namespace App\Http\Responses\Dashboard\Permission\Store;

use App\Services\ResponseBuilder;
use App\Contracts\Responses\Dashboard\Permission\Store\ExceptionHappenBuilder as Contract;
use App\Traits\TranslatorGetterable;
use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Contracts\Translation\Translator;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ExceptionHappenBuilder extends ResponseBuilder implements Contract
{
    use TranslatorGetterable;
    protected Translator $translator;
    public function __construct(Response $response , Translator $translator)
    {
        parent::__construct($response);
        $this->translator = $translator;
    }

    public function build(array $inputs): RedirectResponse
    {
        return $this->getResponse()->redirectToRoute('dashboard.permission.create')
                        ->withInput($inputs)
                        ->with('system.messages.error',[
                            $this->getTranslator()->get('messages.store.permission.exceptionThrow')
                        ]);
    }
}
