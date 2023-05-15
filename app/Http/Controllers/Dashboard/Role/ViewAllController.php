<?php

namespace App\Http\Controllers\Dashboard\Role;

use App\Contracts\Redirectors\Dashboard;
use App\Contracts\Services\DateService;
use App\Contracts\Services\ResponseVisitors\ViewAllAction;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Psr\Log\LoggerInterface as Logger;
use Illuminate\Contracts\Translation\Translator;

class ViewAllController extends Controller
{
    public function __invoke(
        ExceptionHandler $exceptionHandler , Logger $logger , Translator $translator ,
        Dashboard $dashboardRedirector , DateService $dateService , ViewAllAction $viewAllActionVisitor
    ):View|RedirectResponse
    {
        try {
            0/0;
        }catch (\Throwable $exception){
            $logger->emergency(
                $translator->get('log.crud.view_all.throw_exception', ['item' => 'roles'])
            );
            $exceptionHandler->report($exception);
            return $viewAllActionVisitor->throwException($dashboardRedirector->redirect(),'roles');
        }
    }
}
