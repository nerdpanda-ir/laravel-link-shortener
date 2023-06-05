<?php

namespace App\Http\Controllers\Link;

use App\Contracts\Model\Link;
use App\Contracts\Services\AuthenticatedUser;
use App\Contracts\Services\Commands\CreateLink;
use App\Contracts\Services\DateService;
use App\Contracts\Services\ResponseVisitors\SaveAction as SaveActionResponseVisitor;
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

        Request $request , CreateLink $createLinkCommand , DateService $dateService , Logger $logger ,
        AuthenticatedUser $authenticatedUser , Redirector $redirector , Translator $translator ,
        ExceptionHandler $exceptionHandler , SaveActionResponseVisitor $saveActionResponseVisitor ,
    ):RedirectResponse
    {
        try {
            $authenticatedUser = $authenticatedUser->getUser();
            $createLinkCommand->setCreatedResponse(
                fn(Link $link) => $redirector->show($link->summary)
            )->setRedirector($redirector);
            return $createLinkCommand->execute(
                $request->get('url') , $dateService->date() , $authenticatedUser?->id
            );
            /*
            $linkData = [
                'original' => $request->get('url'), 'summary'=> $linkModel->generateUniqueSummary() ,
                'creator'=> $authenticatedUser->getUser()?->id , 'created_at' => $dateService->date() ,
            ];
            $linkModel->setRawAttributes($linkData);
            $saved = $linkModel->save();
            if (!$saved)
                throw new FailCrud();
            return $saveActionResponseVisitor->ok( $redirector->show($linkModel->summary) , 'link' );
            */
        }catch (\Throwable $exception){
            $logger->emergency(
                $translator->get('log.crud.save.throw_exception', ['item' => 'link']) ,
                ['link'=> $request->only('url') ]
            );
            $exceptionHandler->report($exception);
            return $saveActionResponseVisitor->throwException(
                $redirector->create($request->only('url')) , 'link'
            );
        }
    }
}
