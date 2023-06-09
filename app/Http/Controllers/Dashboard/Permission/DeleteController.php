<?php

namespace App\Http\Controllers\Dashboard\Permission;

use App\Contracts\Exceptions\FailCrud;
use App\Contracts\Model\Permission as Permission;
use App\Contracts\Redirectors\Dashboard\Permission as PermissionRedirector;
use App\Contracts\Services\ResponseVisitors\DeleteAction;
use App\Contracts\Services\ResponseVisitors\NotFound as NotFoundVisitor;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use Psr\Log\LoggerInterface as Logger;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteController extends Controller
{

    /**
     * @param \App\Models\Permission $model
     */
    public function __invoke(
        string $id , string $name , Permission $model, Logger $logger , Translator $translator ,
        ExceptionHandler $exceptionHandler , FailCrud $failCrud, DeleteAction $responseVisitor ,
        NotFoundHttpException $notFoundHttpException , NotFoundVisitor $notFoundVisitor ,
        PermissionRedirector $redirector ,
    ):RedirectResponse
    {
        try {
            $permission = $model->find($id,['id','name']);
            if (is_null($permission))
                throw $notFoundHttpException;
            $deleted = $permission->delete();
            if (!$deleted)
                throw $failCrud;
            return $responseVisitor->ok($redirector->viewAll(),'permission '.$permission->name);
        }catch (NotFoundHttpException $exception ){
            return $notFoundVisitor->visit($redirector->viewAll(),"permission {$permission->name}");
        }catch (FailCrud $exception){
            $exception->setMessage($translator->get('log.crud.delete.fail', ['item' => 'permission']));
            $exception->setContext(['permission_id'=> $permission->id, 'permission_name'=> $permission->name]);
            $exceptionHandler->report($exception);
            return $responseVisitor->fail($redirector->viewAll() ,'permission '.$permission->name);
        }catch (\Throwable $exception){
            $finalName = $permission->name ?? $name;
            $logger->emergency(
                $translator->get('log.crud.delete.throw_exception', ['item' => 'permission']) ,
                ['id' => $id]
            );
            $exceptionHandler->report($exception);
            return $responseVisitor->ThrowException(
                $redirector->viewAll(),'permission with name : '.$finalName
            );
        }
    }
}
