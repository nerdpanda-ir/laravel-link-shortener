<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Contracts\Model\Userable as UserModel;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Psr\Log\LoggerInterface as Logger;
use Illuminate\Contracts\Translation\Translator;
use App\Contracts\Redirectors\Dashboard as DashboardRedirector;
use App\Contracts\Services\ResponseVisitors\ViewAllAction as ViewAllActionResponseVisitor;

class ViewAllController extends Controller
{

    /**
     * @param User $userModel
     */
    public function __invoke(
        UserModel $userModel , ViewFactory $viewFactory , Logger $logger , Translator $translator ,
        ExceptionHandler $exceptionHandler , DashboardRedirector $dashboardRedirector ,
        ViewAllActionResponseVisitor $viewAllActionResponseVisitor ,
    ):RedirectResponse|View
    {
        try {
            $users = $userModel->latest('created_at')->latest('updated_at')
                               ->select([
                                   'id','name','user_id','email' , 'email_verified_at' , 'created_at' , 'updated_at'
                               ])->withCount('roles')->paginate(25,['id']);
            return $viewFactory->make('page.dashboard.user.view-all',compact('users'));
        }catch (\Throwable $exception){
            $logger->emergency(
                $translator->get('log.crud.view_all.throw_exception', ['item' => 'users'])
            );
            $exceptionHandler->report($exception);
            return $viewAllActionResponseVisitor->throwException(
                $dashboardRedirector->redirect() , 'users'
            );
        }
    }
}
