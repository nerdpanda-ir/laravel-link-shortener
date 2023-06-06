<?php

namespace App\Http\Controllers\Dashboard\AdminLink;

use App\Contracts\Model\Link;
use App\Contracts\Redirectors\Dashboard\AdminLink;
use App\Contracts\Redirectors\Dashboard\AdminLink as Redirector;
use App\Contracts\Services\ResponseVisitors\EditAction as EditVisitor;
use App\Contracts\Services\ResponseVisitors\NotFound as NotFoundVisitor;
use App\Http\Controllers\Controller;
use http\Encoding\Stream\Inflate;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Psr\Log\LoggerInterface as Logger;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EditController extends Controller
{

    /**
     * @param \App\Models\Link $linkModel
     * @return View|RedirectResponse
     * @throws \Throwable
     */
    public function __invoke(
        string $id , Request $request , Logger $logger , Translator $translator , ExceptionHandler $exceptionHandler ,
        EditVisitor $editVisitor , Redirector $redirector , NotFoundVisitor $notFoundVisitor , Link $linkModel ,
        SessionManager $sessionManager ,
    ):View|RedirectResponse
    {
        try {
            $link = $linkModel->where('id','=',$id)->first(['id','original','summary','view_count']);
            if (is_null($link))
                throw new NotFoundHttpException();
            $sessionManager->flash('old_link_summary',$link->summary);
            return \view('page.dashboard.admin-Link.edit',compact('link'));
        }catch (NotFoundHttpException $exception){
            return $notFoundVisitor->visit(
                $redirector->viewAll(),
                "link with id : $id and url : {$request->get('link')}"
            );
        }catch (\Throwable $exception){
            $url = $request->get('link',"");
            $logger->emergency(
                $translator->get('log.crud.edit.throw_exception', ['item' => 'link']) ,
                ['link' => (( isset($link) ) ? $link : ['id'=> $id , 'url'=> $url ])]
            );
            $exceptionHandler->report($exception);
            return $editVisitor->throwException(
                $redirector->viewAll(), "link with id -> $id and url -> $url"
            );
        }
    }
}
