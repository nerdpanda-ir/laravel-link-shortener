<?php

namespace App\Http\Controllers;
use App\Contracts\Events\Login;
use App\Contracts\Requests\DoLogin as RequestContract;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Routing\Redirector;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;

class DoLoginController extends Controller
{
    public function __invoke(
        RequestContract $request , Auth $auth , LoggerInterface $logger , Redirector $redirector ,
        Translator $translator , Dispatcher $eventDispatcher , Login $loginEvent
    ):Response
    {
        try {
            $logger->info($translator->get('messages.log.auth.login.start'));
            $credentials = $request->only(['email','password']);
            $isAuthenticated = $auth->guard('web')->attempt($credentials,$request->has('remember'));
            if (!$isAuthenticated)
                return $redirector->route('login')
                        ->withErrors($translator->get('messages.auth.login.fail'))
                        ->withInput($request->only('email','password','remember'));

            $user = $auth->guard('web')->user();
            $loginEvent->setUser($user);
            $eventDispatcher->dispatch($loginEvent);
            return $redirector->to(RouteServiceProvider::HOME)
                    ->with('system.messages.ok',[
                        $translator->get('messages.auth.login.ok',['name' => $user->name])
                    ]);
        }catch (\Throwable $exception){
            $logger->info($translator->get('messages.log.auth.login.exceptionThrow'));
            report($exception);
            return $redirector->route('login')
                    ->withErrors($translator->get('messages.auth.login.exceptionThrow'))
                    ->withInput($request->only('email','password','remember'));
        }
    }
}
