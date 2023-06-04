<?php

namespace App\Http\Controllers\Link;

use App\Contracts\Model\Link;
use App\Contracts\Redirectors\Home as HomeRedirector;
use App\Contracts\Services\ResponseVisitors\ShowAction as ShowActionResponseVisitor;
use App\Events\LinkShowed;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Psr\Log\LoggerInterface as Logger;
use App\Contracts\Events\LinkShowed as LinkShowedEvent;
class ShowController extends Controller
{

    /**
     * @param \App\Models\Link $linkModel
     * @return View|RedirectResponse
     */
    public function __invoke(
        string $summary , Link $linkModel , Logger $logger , Translator $translator , HomeRedirector $homeRedirector ,
        ExceptionHandler $exceptionHandler , ShowActionResponseVisitor $showActionResponseVisitor ,
        Dispatcher $dispatcher , LinkShowedEvent $showedEvent
    ):View|RedirectResponse
    {
        try {
            $link = $linkModel->where('summary','=',$summary)->first(['id','original','view_count']);
            if (is_null($link))
                throw new NotFoundHttpException();
            // @todo create link visitors table for detect view count
            $showedEvent->setLink($link);
            $dispatcher->dispatch($showedEvent);
            return \view('page.links.show',['summary' => $summary , 'original'=> $link->original]);
        }catch (NotFoundHttpException $exception){
            throw $exception;
        }catch (\Throwable $exception){
            $context = ['summary'=> $summary];
            $logger->emergency(
                $translator->get('log.crud.show.throw_exception', ['item' => 'link']) ,
                ( (isset($link)) ? array_merge(['model'=>$link],$context) : $context )
            );
            $exceptionHandler->report($exception);
            return $showActionResponseVisitor->throwException(
                $homeRedirector->redirect() , 'link'
            );
        }
    }
}
