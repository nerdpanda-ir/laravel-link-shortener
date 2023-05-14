<?php

namespace App\Http\Controllers\Dashboard\Permission;

use App\Contracts\Exceptions\FailCrud as FailUpdateException;
use App\Contracts\Model\Permission as Permission;
use App\Contracts\Requests\Dashboard\Permission\Update as Request;
use App\Contracts\Responses\Dashboard\Permission\Update\ExceptionThrow;
use App\Contracts\Responses\Dashboard\Permission\Update\Fail as FailResponseBuilder;
use App\Contracts\Responses\Dashboard\Permission\Update\Ok as OkResponseBuilder;
use App\Contracts\Services\ResponseVisitors\NotFound;
use App\Contracts\Services\ResponseVisitors\UpdateAction;
use App\Exceptions\FailCrud;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use Psr\Log\LoggerInterface as Logger;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Contracts\Redirectors\Permission as Redirector;
class UpdateController extends Controller
{
    /**
     * @param string $name
     * @param Request $request
     * @param \App\Models\Permission $model
     * @return RedirectResponse
     */
    public function __invoke(
        string $id , string $name , Request $request , Permission $model , Logger $logger , Translator $translator ,
        NotFound $notFoundVisitor , Redirector $redirector , UpdateAction $visitor , ExceptionHandler $exceptionHandler ,
        FailCrud $failUpdateException , NotFoundHttpException $notFoundException ,
    ):RedirectResponse
    {
        try {
            $permission = $model->where('id','=',$id)->first(['name','id']);
            if (is_null($permission))
                throw $notFoundException;
            $data = array_merge($request->only(['name']),['updated_at'=>date('Y-m-d H:i:s')]);
            $permission->setRawAttributes($data);
            $updated = $permission->update();
            if (!$updated)
                throw $failUpdateException;
            return $visitor->ok(
                $redirector->viewAll(),
                "permission with id -> $id and name ->$permission->name "
            );
        }catch (FailUpdateException $exception){
            $exception->setContext(['id' => $id , 'name' => $name]);
            $exception->setMessage($translator->get('log.crud.updated.fail', ['item' => 'permission']));
            $exceptionHandler->report($exception);
            return $visitor->fail(
                $redirector->edit($id,$name,$request->only(['name'])) ,
                "permission with name $name" ,
            );
        }
        catch (NotFoundHttpException $exception){
            return $notFoundVisitor->visit($redirector->viewAll(),'permission with name -> '.$name);
        }catch (\Throwable $exception){
            $finalName = $permission->name ?? $name;
            $logger->emergency(
                $translator->get('log.crud.updated.fail', ['item' => 'permission']) ,
                ['id' => $id , 'name' => $finalName]
            );
            $exceptionHandler->report($exception);
            return $visitor->throwException(
                $redirector->edit($id , $finalName , $request->only('name')) ,
                "permission $finalName"
            );
        }
    }
}
