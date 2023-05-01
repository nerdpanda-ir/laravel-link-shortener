<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequestLoggerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            \Log::info(trans('log.request'),[
                'ip'=> $request->ip() ,
                'method'=> $request->method() , 'destination' => $request->fullUrl() , 'inputs' => $request->all()
            ]);
        }catch (\Throwable $exception) {
            report($exception);
        } finally {
            return $next($request);
        }
    }
}
