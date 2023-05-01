<?php

namespace App\Http\Controllers;
use App\Contracts\DoLoginRequestContract as RequestContract;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Routing\Redirector;
use  Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;

class DoLoginController extends Controller
{
    public function __invoke(
        RequestContract $request , Auth $auth , LoggerInterface $logger , Redirector $redirector
    ):Response
    {
        try {
            $logger->info(trans('messages.log.auth.start'));
            $credentials = $request->only(['email','password']);
            $isAuthenticated = $auth->guard('web')->attempt($credentials,$request->has('remember'));
            if (!$isAuthenticated) {
                $logger->info(trans('messages.log.auth.fail'));
                return $redirector->route('login')
                        ->withErrors(trans('messages.auth.fail'))
                        ->withInput($request->only('email','password','remember'));
            }
            $logger->info(trans('messages.log.auth.success'));
            $user = $auth->guard('web')->user();
            return $redirector->route('dashboard')
                    ->with('system.messages.ok',[trans('messages.auth.success',['name' => $user->name])]);
        }catch (\Throwable $exception){
            $logger->info(trans('messages.log.auth.exceptionHappen'));
            report($exception);
            return $redirector->route('login')
                    ->withErrors(trans('messages.auth.exceptionHappen'))
                    ->withInput($request->only('email','password','remember'));
        }
    }
}
