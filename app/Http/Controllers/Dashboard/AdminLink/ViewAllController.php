<?php

namespace App\Http\Controllers\Dashboard\AdminLink;

use App\Contracts\Model\Link;
use App\Contracts\Redirectors\Dashboard;
use App\Contracts\Services\ResponseVisitors\ViewAllAction;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\View\View;
use Psr\Log\LoggerInterface as Logger;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ViewAllController extends Controller
{

    /**
     * @param \App\Models\Link $linkModel
     * @return View
     */
    public function __invoke(
        Link $linkModel , ViewAllAction $responseVisitor , Dashboard $dashboardRedirector , Logger $logger ,
        Translator $translator , ExceptionHandler $exceptionHandler ,
    ):View|RedirectResponse
    {
        try {
            $links = $linkModel->with('creator:id,name')->latest()->paginate(25);
            return \view('page.dashboard.admin-Link.viewAll',compact('links'));
        }catch (\Throwable $exception){
            $logger->emergency(
                $translator->get('log.crud.view_all.throw_exception', ['item' => 'links'])
            );
            $exceptionHandler->report($exception);
            return $responseVisitor->throwException(
                $dashboardRedirector->redirect() , 'links'
            );
        }
    }
}
