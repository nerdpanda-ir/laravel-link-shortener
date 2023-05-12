<?php

namespace App\Services;

use Illuminate\Contracts\Translation\Translator;
use Psr\Log\LoggerInterface as Logger;
use App\Contracts\Services\LoggerMiddleware as Contract;

abstract class LoggerMiddleware implements Contract
{
    protected Logger $logger;
    protected Translator $translator;
    public function __construct(Logger $logger , Translator $translator)
    {
        $this->logger = $logger ;
        $this->translator = $translator ;
    }
}
