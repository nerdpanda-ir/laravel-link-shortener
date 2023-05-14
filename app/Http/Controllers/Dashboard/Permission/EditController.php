<?php

namespace App\Http\Controllers\Dashboard\Permission;

use App\Contracts\Model\Permission as Permission;
use App\Contracts\Responses\Dashboard\Permission\Edit\ExceptionThrow;
use App\Contracts\Services\ResponseVisitors\EditAction;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use Psr\Log\LoggerInterface as Logger;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Contracts\Services\ResponseVisitors\NotFound ;
use App\Contracts\Redirectors\Permission as Redirector;
class EditController extends Controller
{

    /**
     * @param \App\Models\Permission $model
     * @return void
     */
    public function __invoke(
        string $id , string $name , Permission $model , ViewFactory $viewFactory ,  Logger $logger ,
        Translator $translator , NotFound $notFound , Redirector $redirector , EditAction $editAction ,
        NotFoundHttpException $notFoundHttpException , ExceptionHandler $exceptionHandler ,
    ): View | RedirectResponse
    {
        try {
            $permission = $model->where('id','=',$id)->first(['name']);
            if (is_null($permission))
                throw $notFoundHttpException;
            return $viewFactory
                        ->make('page.dashboard.permission.edit',['id'=> $id , 'name' => $permission->name]);
        }catch (NotFoundHttpException $exception){
            return $notFound->visit($redirector->viewAll(),'permission '.$name);
            // if should you render 404 page you must render exception with laravel exception handler !!!
            // you can get exception handler from container and call render method or
            #return $exceptionHandler->render(\request(),$exception);
            // throw again exception
            //throw $exception;
        } catch (\Throwable $exception){
            $finalName = $permission->name ?? $name ;
            $logger->emergency(
                $translator->get('log.crud.edit.throw_exception',['item' => 'permission'] ) ,
                ['id' => $id ,'name' => $finalName]
            );
            $exceptionHandler->report($exception);
            return $editAction->throwException($redirector->viewAll(),$finalName . ' permission');
        }
    }
}
