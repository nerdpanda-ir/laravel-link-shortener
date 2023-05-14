<?php

namespace App\Services\ResponseVisitors;
use App\Contracts\Services\ResponseVisitors\UpdateAction as Contract;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UpdateAction extends Cruds implements Contract
{
    public function ok(RedirectResponse $response, string $item): RedirectResponse
    {
        return $response->with('system.messages.ok',[
           $this->getTranslator()->get('messages.crud.update.ok', ['item' => $item ])
        ]);
    }
    public function fail(RedirectResponse $response, string $item): RedirectResponse
    {
        return $response->with('system.messages.error',[
            $this->getTranslator()->get('messages.crud.update.fail', ['item' => $item ])
        ]);
    }
    public function throwException(RedirectResponse $response, string $item): RedirectResponse
    {
        return $response->with('system.messages.error',[
            $this->getTranslator()->get(
                'messages.crud.update.throw_exception',
                ['date' => date('Y-m-d hiH:i:s'), 'item' =>  $item ]
            )
        ]);
    }

}
