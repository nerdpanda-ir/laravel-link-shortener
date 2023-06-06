<?php

namespace App\Http\Controllers\Dashboard\AdminLink;

use App\Contracts\Exceptions\FailCrud as FailCrudContract;
use App\Contracts\Model\Link;
use App\Contracts\Redirectors\Dashboard\AdminLink as Redirector;
use App\Contracts\Services\ResponseVisitors\DeleteAction;
use App\Contracts\Services\ResponseVisitors\NotFound;
use App\Exceptions\FailCrud;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface as Logger;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteController extends Controller
{

    /**
     * @param \App\Models\Link $link
     * @return RedirectResponse
     */
    public function __invoke(
        string $id , Request $request , Link $linkModel , Redirector $redirector , NotFound $notFoundVisitor ,
        Translator $translator , ExceptionHandler $exceptionHandler , DeleteAction $responseVisitor ,
        Logger $logger ,
    ):RedirectResponse
    {
        try {
            $link = $linkModel->where('id','=',$id)->first(['id','original']);
            if (is_null($link))
                throw new NotFoundHttpException();
            $deleted = $link->delete();
            if (!$deleted)
                throw new FailCrud();
            return $responseVisitor->ok(
                $redirector->viewAll(),"link with id => $id and with url => {$link->original}"
            );
        }catch (NotFoundHttpException $exception){
            return $notFoundVisitor->visit(
                $redirector->viewAll() , "link with id : $id and url -> {$request->get('link')}"
            );
        }catch (FailCrudContract $exception){
            $exception->setMessage($translator->get('log.crud.delete.fail', ['item' => 'link']));
            $exception->setContext(['link'=> $link ]);
            $exceptionHandler->report($exception);
            return $responseVisitor->fail(
                $redirector->viewAll() , "link with id => $id and with url => {$link->original}"
            );
        }catch (\Throwable $exception){
            $hasLinkModel = isset($link);
            $logger->emergency(
                $translator->get('log.crud.delete.throw_exception', ['item' => 'link']) ,
                ['link'=> ( ( $hasLinkModel ) ? $link : ['id'=> $id , 'url'=> $request->get('link')] )]
            );
            $exceptionHandler->report($exception);
            return $responseVisitor->throwException(
                $redirector->viewAll(),
                " link with id -> $id and url -> ".( ( $hasLinkModel ) ? $link->original : $request->get('link') )
            );
        }
    }
}
