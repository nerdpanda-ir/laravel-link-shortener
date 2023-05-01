<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResponseLoggerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
    public function terminate(Request $request , Response $response):void {
        try {
            \Log::info(trans('log.response'),[
                'status_code' => $response->getStatusCode() ,
            ]);
        } catch (\Throwable $exception){
            report($exception);
        }
    }
}
