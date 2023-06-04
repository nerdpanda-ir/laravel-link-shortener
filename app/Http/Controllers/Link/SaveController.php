<?php

namespace App\Http\Controllers\Link;

use App\Contracts\Model\Link;
use App\Contracts\Services\AuthenticatedUser;
use App\Contracts\Services\DateService;
use App\Contracts\Services\ResponseVisitors\SaveAction as SaveActionResponseVisitor;
use App\Exceptions\FailCrud;
use App\Contracts\Exceptions\FailCrud as FailCrudExceptionContract;
use App\Http\Controllers\Controller;
use App\Services\ResponseVisitors\SaveAction;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use App\Contracts\Redirectors\Link as Redirector;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Contracts\Requests\Link\Save as Request;
use Psr\Log\LoggerInterface as Logger;
class SaveController extends Controller
{
    /**
     * @var \App\Models\Link $linkModel
     * @var SaveAction $saveActionResponseVisitor
    */
    public function __invoke(
        Request $request , Link $linkModel , DateService $dateService , AuthenticatedUser $authenticatedUser ,
        Logger $logger , Translator $translator , ExceptionHandler $exceptionHandler ,
        SaveActionResponseVisitor $saveActionResponseVisitor , Redirector $redirector ,
    ):RedirectResponse
    {
        try {
            $linkData = [
                'original' => $request->get('url'), 'summary'=> $linkModel->generateUniqueSummary() ,
                'creator'=> $authenticatedUser->getUser() , 'created_at' => $dateService->date() ,
            ];
            $linkModel->setRawAttributes($linkData);
            $saved = $linkModel->save();
            if (!$saved)
                throw new FailCrud();
            return $saveActionResponseVisitor->ok( $redirector->show($linkModel->summary) , 'link' );
        }catch (FailCrudExceptionContract $exception){
            // bootstrap
            $exception->setMessage($translator->get('log.crud.save.fail', ['item' => 'link']));
            $exception->setContext(['link'=>$linkModel]);
            // report
            $exceptionHandler->report($exception);
            //redirect
            return $saveActionResponseVisitor->fail(
                $redirector->create($request->only('url')) , 'link'
            );
        }catch (\Throwable $exception){
            $logger->emergency(
                $translator->get('log.crud.save.throw_exception', ['item' => 'link']) ,
                ['link'=> (( isset($linkData) ) ? $linkData : $request->only('url') )]
            );
            $exceptionHandler->report($exception);
            return $saveActionResponseVisitor->throwException(
                $redirector->create($request->only('url')) , 'link'
            );
        }
    }
}
