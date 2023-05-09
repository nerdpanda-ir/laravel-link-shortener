<?php

namespace App\Http\Controllers\Dashboard\Permission;

use App\Contracts\Exceptions\FailDelete;
use App\Contracts\Responses\Dashboard\Permission\Delete\Fail;
use App\Contracts\Responses\Dashboard\Permission\Delete\Ok;
use App\Contracts\Responses\Dashboard\Permission\NotFound;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Psr\Log\LoggerInterface as Logger;
use App\Contracts\PermissionModelContract as Permission;
use App\Contracts\Responses\Dashboard\Permission\Delete\ThrowException ;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteController extends Controller
{

    /**
     * @param \App\Models\Permission $model
     */
    public function __invoke(
        string $id , string $name , Permission $model ,
        ExceptionHandler $exceptionHandler , FailDelete $failDeleteException ,
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
                throw $failDeleteException;
            $logger->info(
                $translator->get('messages.delete.permission.ok', ['name' => $permission->name])
            );
            return $okResponseBuilder->build($permission->name);
        }catch (NotFoundHttpException $exception ){
            return $notFoundResponseBuilder->build($name);
        }catch (FailDelete $exception){
            $exception->setMessage(
                $translator->get('messages.log.delete.permission.fail', ['id' => $id])
            );
            $exceptionHandler->report($exception);
            return $failDeleteResponseBuilder->build($permission->name);
        }catch (\Throwable $exception){
            $finalName = $permission->name ?? $name;
            $logger->emergency(
                $translator->get('messages.log.delete.permission.fail', ['id' => $id])
            );
            $exceptionHandler->report($exception);
            return $throwExceptionResponseBuilder->build($finalName);
        }
    }
}
