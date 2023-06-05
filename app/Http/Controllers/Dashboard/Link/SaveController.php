<?php

namespace App\Http\Controllers\Dashboard\Link;

use App\Contracts\Model\Link as LinkModel;
use App\Contracts\Redirectors\Dashboard\Link;
use App\Contracts\Requests\Link\Save;
use App\Contracts\Services\AuthenticatedUser;
use App\Contracts\Services\Commands\CreateLink;
use App\Contracts\Services\DateService;
use App\Contracts\Services\ResponseVisitors\SaveAction;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use Psr\Log\LoggerInterface as Logger;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SaveController extends Controller
{

    /**
     * @param \App\Http\Requests\Link\Save $request
     * @return RedirectResponse
     */
    public function __invoke(
        Save $request , CreateLink $createLinkCommand , Link $linkRedirector , DateService $dateService ,
        AuthenticatedUser $authenticatedUser , SaveAction $saveActionResponseVisitor , Logger $logger ,
        Translator $translator , ExceptionHandler $exceptionHandler ,
    ):RedirectResponse
    {
        try {
            // @todo duplicated code with create link in front
            // @todo duplicate try catch code in all controller
            $createLinkCommand->setCreatedResponse(
                fn(LinkModel $link) => $linkRedirector->viewAll()
            )->setRedirector($linkRedirector);
            return $createLinkCommand->execute(
                $request->get('url'),$dateService->date() , $authenticatedUser->getUser()->id
            );
        }catch (\Throwable $exception){
            $logger->emergency(
                $translator->get('log.crud.save.throw_exception', ['item' => 'link']) ,
                ['link'=> $request->get('url')]
            );
            $exceptionHandler->report($exception);
            return $saveActionResponseVisitor->throwException(
                $linkRedirector->create($request->only('url')) , 'link'.$request->get('url')
            );
        }
    }
}
