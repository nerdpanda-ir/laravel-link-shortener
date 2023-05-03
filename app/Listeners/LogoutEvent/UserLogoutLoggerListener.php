<?php

namespace App\Listeners\LogoutEvent;

use Illuminate\Auth\Events\Logout;
use Psr\Log\LoggerInterface as Logger;
use Illuminate\Contracts\Translation\Translator;

class UserLogoutLoggerListener
{
    protected Logger $logger;
    protected Translator $translator;
    public function __construct(Logger $logger, Translator $translator)
    {
        $this->logger = $logger;
        $this->translator = $translator;
    }

    public function handle(Logout $event): void
    {
       $this->logger->info(
           $this->translator->get('messages.log.auth.logout.success', ['id' => $event->user->id])
       );
    }
}
