<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Routing\Redirector;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;

class LogoutController extends Controller
{
    public function __invoke(Auth $auth,Redirector $redirector ): Response
    {
        // log , trans , logout email
        try {
           $user = $auth->guard('web')->user();
           $auth->guard('web')->logout();
           return $redirector->route('home')->with('system.messages.ok',["dear {$user->name} your successfully logout !!!"]);
        }catch (\Throwable $exception){
            report($exception);
            return $redirector->route('home')->with('system.messages.error',["your logout process is fail please try after or contact to help and support !!!"]);
        }
    }
}
