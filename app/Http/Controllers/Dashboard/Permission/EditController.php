<?php

namespace App\Http\Controllers\Dashboard\Permission;

use App\Contracts\Responses\Dashboard\Permission\Edit\ExceptionThrow;
use App\Http\Controllers\Controller;
use App\Contracts\PermissionModelContract as Permission;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Contracts\Responses\Dashboard\Permission\NotFound;
use Psr\Log\LoggerInterface as Logger;
use Illuminate\Contracts\Translation\Translator ;

class EditController extends Controller
{

    /**
     * @param \App\Models\Permission $model
     * @return void
     */
    public function __invoke(
        string $id , string $name , Permission $model , ViewFactory $viewFactory ,  Logger $logger ,
        Translator $translator ,
        NotFoundHttpException $notFoundHttpException , ExceptionHandler $exceptionHandler ,
        NotFound $notFoundResponseBuilder , ExceptionThrow $exceptionThrowResponseBuilder ,
    ): View | RedirectResponse
    {
        try {
            $permission = $model->where('id','=',$id)->first(['name']);
            if (is_null($permission))
                throw $notFoundHttpException;
            return $viewFactory->make('page.dashboard.permission.edit',compact('name'));
        }catch (NotFoundHttpException $exception){
            return $notFoundResponseBuilder->build($name);
            // if should you render 404 page you must render exception with laravel exception handler !!!
            // you can get exception handler from container and call render method or
            #return $exceptionHandler->render(\request(),$exception);
            // throw again exception
            //throw $exception;
        } catch (\Throwable $exception){
            $logger->emergency(
                $translator->get('messages.log.edit.permission.exceptionThrow', ['permission' => $name ])
            );
            $exceptionHandler->report($exception);
            return $exceptionThrowResponseBuilder->build($name);
        }
    }
}
