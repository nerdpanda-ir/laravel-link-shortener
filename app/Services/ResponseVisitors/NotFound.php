<?php

namespace App\Services\ResponseVisitors;
use App\Contracts\Services\ResponseVisitors\NotFound as Contract;
use App\Traits\TranslatorGetterable;
use Illuminate\Contracts\Translation\Translator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class NotFound implements Contract
{
    use TranslatorGetterable;
    protected Translator $translator;
    public function __construct(Translator $translator)
    {
        $this->translator = $translator ;
    }

    public function visit(Response $response , string $item): RedirectResponse
    {
        return $response->with('system.messages.error',[
            $this->getTranslator()->get('messages.not_found', ['item' => $item ])
        ]);
    }
}
