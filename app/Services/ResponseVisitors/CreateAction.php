<?php

namespace App\Services\ResponseVisitors;
use App\Contracts\Services\ResponseVisitors\CreateAction as Contract;
use App\Traits\TranslatorGetterable;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Contracts\Translation\Translator;
class CreateAction implements Contract
{
    use TranslatorGetterable;
    protected Translator $translator;
    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function throwException(RedirectResponse $response, string $item): RedirectResponse
    {
        return $response->with('system.messages.error',[
            $this->getTranslator()->get(
                'messages.crud.create.throw_exception',
                ['date' => date('Y-m-d H:i:s'), 'item' => $item ]
            )
        ]);
    }
}
