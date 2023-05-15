<?php

namespace App\Listeners\LoginEvent;

use App\Contracts\Events\Login;
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

    public function handle(Login $event): void
    {
        $this->logger->info(
            $this->translator->get('messages.log.auth.login.ok', ['user'=> $event->getUser()])
        );
    }
}
