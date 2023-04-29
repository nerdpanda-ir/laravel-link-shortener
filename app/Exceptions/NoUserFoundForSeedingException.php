<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class NoUserFoundForSeedingException extends Exception
{
    protected string $seeder;
    public function __construct(string $seeder , int $code = 0, ?Throwable $previous = null)
    {
        $this->message = trans('exceptions.noUserFoundForSeeding',['seeder'=>$seeder]);
        parent::__construct($this->message, $code, $previous);
    }

}
