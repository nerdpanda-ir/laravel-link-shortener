<?php

namespace App\Services\ResponseVisitors;
use App\Contracts\Services\ResponseVisitors\ShowAction as Contract;
use App\Traits\TranslatorGetterable;
use Illuminate\Contracts\Translation\Translator;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ShowAction extends ResponseVisitor implements Contract
{
    use TranslatorGetterable;
    protected Translator $translator;
    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function throwException(RedirectResponse $response, string $item): RedirectResponse
    {
        // @todo duplicate code in many visitors !!!
        return $response->with('system.messages.error',[
            $this->getTranslator()->get(
                'messages.crud.show.throw_exception',
                ['date' => date('Y-m-d H:i:s'), 'item' => $item ]
            )
        ]);
    }
}
