<?php

namespace App\Exceptions;

use Exception;
use App\Contracts\Exceptions\FailStore as Contract;
class FailStoreException extends Exception implements Contract
{
    public function setMessage(string $message): void
    {
        $this->message = $message ;
    }

}
