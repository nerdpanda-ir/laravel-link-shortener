<?php

namespace App\Http\Middleware;

use App\Services\LoggerMiddleware;
use Closure;
use Illuminate\Http\Request;

class RequestLoggerMiddleware extends LoggerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $this->getLogger()->info(
                $this->getTranslator()->get('log.request_start') ,[
                    'ip'=> $request->ip() , 'method'=> $request->method() , 'route'=> $request->route()->getName() ,
                    'destination' => $request->fullUrl() , 'action'=> $request->route()->getAction() ,
                    'inputs' => $request->all() ,
                ]
            );
        }catch (\Throwable $exception) {
            report($exception);
        } finally {
            return $next($request);
        }
    }
}
