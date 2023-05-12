<?php

namespace App\Services;

use Illuminate\Contracts\Translation\Translator;
use Psr\Log\LoggerInterface as Logger;
use App\Contracts\Services\LoggerMiddleware as Contract;
use App\Traits\Services\LoggerMiddleware as LoggerMiddlewareTrait;
abstract class LoggerMiddleware implements Contract
{
    use LoggerMiddlewareTrait;
    protected Logger $logger;
    protected Translator $translator;
    public function __construct(Logger $logger , Translator $translator)
    {
        $this->logger = $logger ;
        $this->translator = $translator ;
    }
}
