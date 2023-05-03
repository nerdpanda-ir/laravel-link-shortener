<?php

namespace App\Listeners\LoginFailEvent;

use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Translation\Translator;
use Psr\Log\LoggerInterface as Logger;
class LoggerListener
{
    protected Logger $logger;
    protected Translator $translator;
    public function __construct(Logger $logger , Translator $translator)
    {
        $this->logger = $logger;
        $this->translator = $translator;
    }

    public function handle(Failed $event): void
    {
        $this->logger->info(
            $this->translator->get('messages.log.auth.login.fail')
        );
    }
}
