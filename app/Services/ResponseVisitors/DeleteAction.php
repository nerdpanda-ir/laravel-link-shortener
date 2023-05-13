<?php

namespace App\Services\ResponseVisitors;

use App\Contracts\Services\ResponseVisitors\DeleteAction as Contract;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DeleteAction extends Cruds
    implements Contract
{
    public function ok(RedirectResponse $response, string $item): RedirectResponse
    {
        $message = [
            $this->getTranslator()->get('messages.crud.delete.ok', ['item' => $item])
        ];
        return $response->with('system.messages.ok',$message);
    }

    public function fail(RedirectResponse $response, string $item): RedirectResponse
    {
        $message = [
            $this->getTranslator()->get('messages.crud.delete.fail', ['item' => $item])
        ];
        return $response->with('system.messages.error',$message);
    }

    public function ThrowException(RedirectResponse $response, string $item): RedirectResponse
    {
        $message = [
            $this->getTranslator()->get(
                'messages.crud.delete.throw_exception',
                ['item' => $item , 'date' => date('Y-m-d H:i:s')]
            )
        ];
        return $response->with('system.messages.error',$message);
    }


}
