<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Http\Response;

class LogoutController extends Controller
{
    public function __invoke(Auth $auth):Response
    {
        try {
            dump(__METHOD__);
        }catch (\Throwable $exception){
            report($exception);
        }
    }
}
