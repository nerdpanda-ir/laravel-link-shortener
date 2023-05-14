<?php

namespace App\Services\ResponseVisitors;

use App\Contracts\Services\ResponseVisitors\EditAction as Contract;
use App\Traits\TranslatorGetterable;
use Illuminate\Contracts\Translation\Translator;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EditAction implements Contract
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
                'messages.crud.edit.throw_exception',
                ['date' => date('Y-m-d H:i:s'), 'item' => $item]
            )
        ]);
    }
}
