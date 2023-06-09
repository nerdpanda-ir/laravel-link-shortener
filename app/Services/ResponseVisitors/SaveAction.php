<?php

namespace App\Services\ResponseVisitors;
use App\Contracts\Services\ResponseVisitors\SaveAction as Contract;
use Illuminate\Contracts\Translation\Translator;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SaveAction extends Cruds implements Contract
{
    public function __construct(Translator $translator)
    {
        parent::__construct($translator);
    }

    public function throwException(RedirectResponse $response, string $item): RedirectResponse
    {
        // @todo date from parent
        return $response->with('system.messages.error',[
            $this->getTranslator()->get(
                'messages.crud.save.throw_exception',
                    ['date' => date('Y-m-d H:i:s'), 'item' => $item]
            )
        ]);
    }

    public function fail(RedirectResponse $response, string $item): RedirectResponse
    {
        return $response->with('system.messages.error',[
           $this->getTranslator()->get('messages.crud.save.fail', ['item' => $item])
        ]);
    }

    public function ok(RedirectResponse $response, string $item): RedirectResponse
    {
        return $response->with('system.messages.ok',[
            $this->getTranslator()->get('messages.crud.save.ok', ['item' => $item])
        ]);
    }

}
