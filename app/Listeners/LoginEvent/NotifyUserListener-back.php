<?php

namespace App\Listeners\LoginEvent;

use App\Contracts\DoLoginRequestContract as Request;
use App\Contracts\Mails\Login as LoginMail;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Mail\Factory as MailManager;
use Illuminate\Contracts\Translation\Translator;
use Psr\Log\LoggerInterface as Logger;

class NotifyUserListenerBackup
{
    protected Logger $logger;
    protected LoginMail $loginMail ;
    protected MailManager $mailManager;
    protected Request $request;
    protected Translator $translator;

    public function __construct(
        Logger $logger, LoginMail $loginMail ,MailManager $mailManager , Request $request , Translator $translator
    )
    {
        $this->loginMail = $loginMail;
        $this->mailManager = $mailManager ;
        $this->request = $request;
        $this->logger  = $logger;
        $this->translator = $translator ;
    }

    public function handle(Login $event): void
    {
        try {
            $this->logger->info(
                $this->translator->get('messages.log.mails.login.start')
            );
            $this->loginMail
                ->with([
                    'name'=>$event->user->name,'ip'=>$this->request->ip()
                ])
                ->to($event->user->email);
            $this->mailManager->send($this->loginMail);
            $this->logger->info(
                $this->translator->get('messages.log.mails.login.done')
            );
        }catch (\Throwable $exception){
            $this->logger->info(
                $this->translator->get('messages.log.mails.login.exceptionThrow')
            );
            report($exception);
        }

    }
}
