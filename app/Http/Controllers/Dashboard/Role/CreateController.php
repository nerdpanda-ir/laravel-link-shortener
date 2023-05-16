<?php

namespace App\Http\Controllers\Dashboard\Role;

use App\Contracts\Model\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Psr\Log\LoggerInterface as Logger;
use Illuminate\Contracts\Translation\Translator ;
use App\Http\Redirector\Role as Redirector;
use App\Contracts\Services\ResponseVisitors\CreateAction as ResponseVisitor;
use Illuminate\Contracts\View\Factory as ViewFactory;

class CreateController extends Controller
{

    /**
     * @param \App\Models\Permission $permission
     * @throws \Throwable
     */
    public function __invoke(
        Logger $logger , ExceptionHandler $exceptionHandler , Translator $translator , Redirector $redirector ,
        ResponseVisitor $responseVisitor , ViewFactory $viewFactory , Permission $permission
    ):View|RedirectResponse
    {
        try {
            $permissions = $permission->latest()->get(['id','name']);
            return $viewFactory->make('page.dashboard.role.create')
                               ->with('permissions',$permissions);
        }catch (\Throwable $exception){
            $logger->emergency(
                $translator->get('log.crud.create.throw_exception', ['item' => 'role'])
            );
            $exceptionHandler->report($exception);
            return $responseVisitor->throwException($redirector->viewAll(),'role');
        }
    }
}
