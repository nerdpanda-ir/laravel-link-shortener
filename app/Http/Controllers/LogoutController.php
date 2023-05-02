<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Routing\Redirector;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;

class LogoutController extends Controller
{
    public function __invoke(
        Auth $auth , Redirector $redirector , LoggerInterface $logger , Translator $translator
    ): Response
    {
        // log , logout email
        try {
            $logger->info($translator->get('messages.log.auth.logout.start'));
           $user = $auth->guard('web')->user();
           $auth->guard('web')->logout();
           return $redirector->route('home')
                   ->with('system.messages.ok',[
                       $translator->get('messages.auth.logout.ok', ['name' => $user->name])
                   ]);
        }catch (\Throwable $exception){
            $logger->info($translator->get('messages.log.auth.logout.exceptionThrow'));
            report($exception);
            return $redirector->route('home')
                    ->with('system.messages.error',[
                        $translator->get('messages.auth.logout.exceptionThrow')
                    ]);
        }
    }
}
