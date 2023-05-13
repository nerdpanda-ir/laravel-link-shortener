<?php

namespace App\Services\ResponseVisitors;

use App\Contracts\Services\ResponseVisitors\DeleteActionResponseVisitor as Contract;
use Symfony\Component\HttpFoundation\Response;

class DeleteResponseVisitor extends Cruds
    implements Contract
{
    public function ok(Response $response, string $item): Response
    {
        $message = [
            $this->getTranslator()->get('messages.crud.delete.ok', ['item' => $item])
        ];
        return $response->with('system.messages.ok',$message);
    }

    public function fail(Response $response, string $item): Response
    {
        $message = [
            $this->getTranslator()->get('messages.crud.delete.fail', ['item' => $item])
        ];
        return $response->with('system.messages.ok',$message);
    }

    public function ThrowException(Response $response, string $item): Response
    {
        $message = [
            $this->getTranslator()->get(
                'messages.crud.delete.throw_exception',
                ['item' => $item , 'date' => date('Y-m-d H:i:s')]
            )
        ];
        return $response->with('system.messages.ok',$message);
    }


}
