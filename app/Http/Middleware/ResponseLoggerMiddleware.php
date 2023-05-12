<?php

namespace App\Http\Middleware;

use App\Services\LoggerMiddleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResponseLoggerMiddleware extends LoggerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
    public function terminate(Request $request , Response $response):void {
        try {
            $this->getLogger()->info(
                $this->getTranslator()->get('log.response_delivered') , [
                    'status_code' => $response->getStatusCode() ,
                ]
            );
        } catch (\Throwable $exception){
            report($exception);
        }
    }
}
