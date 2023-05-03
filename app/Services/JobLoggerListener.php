<?php

namespace App\Services;

use Illuminate\Contracts\Translation\Translator;
use Psr\Log\LoggerInterface as Logger;

class JobLoggerListener
{
    protected Logger $logger;
    protected Translator $translator;
    public function __construct(Logger $logger , Translator $translator)
    {
        $this->logger = $logger ;
        $this->translator = $translator;
    }

    /**
     * @return Logger
     */
    public function getLogger(): Logger
    {
        return $this->logger;
    }

    /**
     * @return Translator
     */
    public function getTranslator(): Translator
    {
        return $this->translator;
    }

}
