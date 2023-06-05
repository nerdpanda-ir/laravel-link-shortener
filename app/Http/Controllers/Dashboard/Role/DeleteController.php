<?php

namespace App\Http\Controllers\Dashboard\Role;

use App\Contracts\Exceptions\FailCrud;
use App\Contracts\Model\Role as Role;
use App\Contracts\Redirectors\Dashboard\Role as Redirector;
use App\Contracts\Services\ResponseVisitors\DeleteAction as ResponseVisitor;
use App\Contracts\Services\ResponseVisitors\NotFound as NotFoundResponseVisitor;
use App\Http\Controllers\Controller;
use App\Services\ResponseVisitors\DeleteAction;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use Psr\Log\LoggerInterface as Logger;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteController extends Controller
{

    /**
     * @param string $id
     * @param string $name
     * @param Role $roleModel
     * @param NotFoundHttpException $notFoundException
     * @param NotFoundResponseVisitor $notFoundResponseVisitor
     * @param Redirector $redirector
     * @param Logger $logger
     * @param Translator $translator
     * @param DeleteAction $responseVisitor
     * @param ExceptionHandler $exceptionHandler
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function __invoke(
        string $id , string $name , Role $roleModel , NotFoundHttpException $notFoundException ,
        NotFoundResponseVisitor $notFoundResponseVisitor , Redirector $redirector , Logger $logger ,
        Translator $translator , ResponseVisitor $responseVisitor , ExceptionHandler $exceptionHandler ,
        FailCrud $failCrudException
    ):RedirectResponse
    {
        try {
            $role = $roleModel->find($id,['id','name']);
            if (is_null($role))
                throw $notFoundException;
            $deleted = $role->delete();
            if (!$deleted)
                throw $failCrudException;
            return $responseVisitor->ok(
                $redirector->viewAll() , "role with id : $id and with name $name "
            );
        }catch (NotFoundHttpException $notFoundException){
            return $notFoundResponseVisitor->visit(
                $redirector->viewAll() , "role with id $id and with name ->  $name "
            );
        }catch (FailCrud $failCrudException){
            $logger->emergency(
                $translator->get('log.crud.delete.fail', ['item' => 'role']) ,
                ['id'=> $id , 'name'=> $role->name ]
            );
            return $responseVisitor->fail(
                $redirector->viewAll(), "role with id -> $id and name $name"
            );
        }catch (\Throwable $exception){
            $finalName = $role->name ?? $name;
            $logger->emergency(
                $translator->get('log.crud.delete.throw_exception', ['item' => 'role']) ,
                ['id'=>$id , 'name'=> $finalName ]
            );
            $exceptionHandler->report($exception);
            return $responseVisitor->throwException(
                $redirector->viewAll() , "role with id $id and with name -> $finalName"
            );
        }
    }
}
