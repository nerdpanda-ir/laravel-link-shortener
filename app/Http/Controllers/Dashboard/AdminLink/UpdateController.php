<?php

namespace App\Http\Controllers\Dashboard\AdminLink;

use App\Contracts\Exceptions\FailCrud as FailCrudExceptionContract;
use App\Contracts\Model\Link;
use App\Contracts\Redirectors\Dashboard\AdminLink;
use App\Contracts\Requests\Dashboard\AdminLink\Update as Request;
use App\Contracts\Services\DateService;
use App\Contracts\Services\ResponseVisitors\NotFound;
use App\Contracts\Services\ResponseVisitors\UpdateAction as ResponseVisitor;
use App\Exceptions\FailCrud;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use Psr\Log\LoggerInterface as Logger;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateController extends Controller
{

    /**
     * @param \App\Models\Link $linkModel
     * @return RedirectResponse
     */
    public function __invoke(
        string      $id , Request $request , Link $linkModel , NotFound $notFoundVisitor , AdminLink $redirector ,
        DateService $dateService , Logger $logger , Translator $translator , ExceptionHandler $exceptionHandler ,
        ResponseVisitor $responseVisitor ,
    ):RedirectResponse {
        try {
            $link = $linkModel->where('id','=',$id)->first(['id','original']);
            if (is_null($link))
                throw new NotFoundHttpException();
            $oldOriginal = $link->getAttribute('original');
            $inputs = $request->only(['original','summary','view_count']);
            $linkPayload = array_merge( $inputs , ['updated_at'=> $dateService->date()] );
            $link->setRawAttributes($linkPayload);
            $updated = $link->update();
            if (!$updated)
                throw new FailCrud();
            return $responseVisitor->ok(
                $redirector->viewAll() , "link with id -> $id and url -> $oldOriginal"
            );
        }catch (NotFoundHttpException $exception){
            return $notFoundVisitor->visit(
                $redirector->viewAll(),"link with id -> $id and url -> {$request->get('link')}"
            );
        }catch (FailCrudExceptionContract $exception){
            $exception->setMessage($translator->get('log.crud.updated.fail', ['item' => 'link']));
            $exception->setContext([
                'link'=> ['id'=>$id,'original'=> $oldOriginal] , 'linkModel'=> $link
            ]);
            $exceptionHandler->report($exception);
            return $responseVisitor->fail(
                $redirector->edit($id,$oldOriginal,$inputs) ,
                "link with id -> $id and url -> $oldOriginal"
            );
        }catch (\Throwable $exception){
            $context = [
                'link'=> [
                    'id'=> $id ,
                    'original'=> ( ( isset($oldOriginal) ) ? $oldOriginal : $request->get('link') )
                ]
            ];
            $logger->emergency(
                $translator->get( 'log.crud.updated.throw_exception', [ 'item' => 'link' ] ) ,
                $context
            );
            $exceptionHandler->report($exception);
            return $responseVisitor->throwException(
                $redirector->edit($id , $context['link']['original'] , $request->except(['_token','_method','link'])) ,
                "link with id -> $id and with link -> {$context['link']['original']}"
            );
        }
    }
}
