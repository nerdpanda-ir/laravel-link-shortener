<?php

namespace App\Traits;

trait SetMessageable
{
    public function setMessage(string $message): void
    {
        $this->message = $message ;
    }
}
