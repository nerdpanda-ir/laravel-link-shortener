<?php

namespace App\Http\Controllers\Dashboard\Permission;

use App\Contracts\Exceptions\FailCrud;
use App\Contracts\Model\Permission as Permission;
use App\Contracts\Responses\Dashboard\Permission\Delete\Fail;
use App\Contracts\Responses\Dashboard\Permission\Delete\Ok;
use App\Contracts\Responses\Dashboard\Permission\Delete\ThrowException;
use App\Contracts\Responses\Dashboard\Permission\NotFound;
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
        string $id , string $name , Permission $model ,
        ExceptionHandler $exceptionHandler , FailCrud $failCrud,
        Logger $logger , Translator $translator , ThrowException $throwExceptionResponseBuilder ,
        NotFoundHttpException $notFoundHttpException , NotFound $notFoundResponseBuilder ,
        Ok $okResponseBuilder , Fail $failDeleteResponseBuilder
    ):RedirectResponse
    {
        try {
            $permission = $model->find($id,['id','name']);
            if (is_null($permission))
                throw $notFoundHttpException;
            $deleted = $permission->delete();
            if (!$deleted)
                throw $failCrud;
            return $okResponseBuilder->build($permission->name);
        }catch (NotFoundHttpException $exception ){
            return $notFoundResponseBuilder->build($name);
        }catch (FailCrud $exception){
            $exception->setMessage($translator->get('exceptions.crud',['action' => 'delete permission']));
            $exception->setContext(['permission_id'=> $permission->id, 'permission_name'=> $permission->name]);
            $exceptionHandler->report($exception);
            return $failDeleteResponseBuilder->build($permission->name);
        }catch (\Throwable $exception){
            $finalName = $permission->name ?? $name;
            $logger->emergency(
                $translator->get('exceptions.actions.exception_throw', ['action' => 'delete permission']) ,
                ['id' => $id]
            );
            $exceptionHandler->report($exception);
            return $throwExceptionResponseBuilder->build($finalName);
        }
    }
}
