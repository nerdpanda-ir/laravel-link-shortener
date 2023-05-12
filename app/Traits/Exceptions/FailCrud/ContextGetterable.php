<?php

namespace App\Traits\Exceptions\FailCrud;

trait ContextGetterable
{
    public function context():array {
        return $this->context;
    }
}
