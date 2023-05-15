<?php

namespace App\Http\Controllers\Dashboard\Role;

use App\Contracts\Model\Role;
use App\Contracts\Redirectors\Dashboard;
use App\Contracts\Services\DateService;
use App\Contracts\Services\ResponseVisitors\ViewAllAction;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Psr\Log\LoggerInterface as Logger;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\View\Factory as ViewFactory;

class ViewAllController extends Controller
{

    /**
     * @param \App\Models\Role $role
     * @throws \Throwable
     */
    public function __invoke(
        Role $role , ExceptionHandler $exceptionHandler , Logger $logger , Translator $translator ,
        Dashboard $dashboardRedirector , DateService $dateService , ViewAllAction $viewAllActionVisitor ,
        ViewFactory $viewFactory
    ):View|RedirectResponse
    {
        try {
            $roles = $role->withCount(['permissions','users'])
                          ->with('creator')->latest()
                          ->paginate(25,);
            return $viewFactory->make('page.dashboard.role.view-all',compact('roles'));
        }catch (\Throwable $exception){
            $logger->emergency(
                $translator->get('log.crud.view_all.throw_exception', ['item' => 'roles'])
            );
            $exceptionHandler->report($exception);
            return $viewAllActionVisitor->throwException($dashboardRedirector->redirect(),'roles');
        }
    }
}
