<?php

namespace App\Contracts\Exceptions\FailCrud;

interface ContextGetterable
{
    public function context():array;
}
