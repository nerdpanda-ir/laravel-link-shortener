<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\Model\Link;
use App\Contracts\Redirectors\Dashboard as DashboardRedirector;
use App\Contracts\Services\AuthenticatedUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Contracts\Services\ResponseVisitors\ViewAllAction;
use Psr\Log\LoggerInterface as Logger;

class ViewAllLinksController extends Controller
{

    /**
     * @param \App\Models\Link $linkModel
     * @return View|RedirectResponse
     */
    public function __invoke(
        AuthenticatedUser $authenticatedUser , Link $linkModel , Logger $logger , Translator $translator ,
        ExceptionHandler $exceptionHandler , DashboardRedirector $dashboardRedirector ,
        ViewAllAction $viewAllResponseVisitor
    ):View|RedirectResponse
    {
        try {
            /** @var User $authenticatedUser */
            $authenticatedUser = $authenticatedUser->getUser();
            $links = $linkModel->where('creator','=',$authenticatedUser->id)->latest()
                               ->paginate(25,['original','summary','view_count','created_at']);
            return \view('page.dashboard.viewAllLinks',compact('links'));
        }catch (\Throwable $exception){
            $item = 'user links ';
            $logger->emergency(
                $translator->get('log.crud.view_all.throw_exception', ['item' => $item ])
            );
            $exceptionHandler->report($exception);
            return $viewAllResponseVisitor->throwException(
                $dashboardRedirector->redirect() , $item
            );
        }
    }
}
