<?php

namespace App\Http\Controllers\Dashboard\Permission;

use App\Contracts\Exceptions\FailUpdate as FailUpdateException;
use App\Contracts\Model\Permission as Permission;
use App\Contracts\Requests\Dashboard\Permission\Update as Request;
use App\Contracts\Responses\Dashboard\Permission\NotFound as NotFoundResponseBuilder;
use App\Contracts\Responses\Dashboard\Permission\Update\ExceptionThrow;
use App\Contracts\Responses\Dashboard\Permission\Update\Fail as FailResponseBuilder;
use App\Contracts\Responses\Dashboard\Permission\Update\Ok as OkResponseBuilder;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use Psr\Log\LoggerInterface as Logger;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        ExceptionThrow $exceptionThrowResponseBuilder , FailResponseBuilder $failResponseBuilder ,
        NotFoundHttpException $notFoundException , NotFoundResponseBuilder $notFoundResponseBuilder ,
        ExceptionHandler $exceptionHandler , FailUpdateException $failUpdateException ,
        OkResponseBuilder $okResponseBuilder
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
            $logger->info(
                $translator->get(
                    'messages.log.update.permission.ok',
                    ['id' => $id , 'name' => $name , 'newName' => $permission->name]
                )
            );
            return $okResponseBuilder->build($permission->name);
        }catch (FailUpdateException $exception){
            $exception->setMessage(
                $translator->get(
                    'messages.log.update.permission.fail',
                    ['id' => $id , 'name' => $name])
            );
            $exceptionHandler->report($exception);
            return $failResponseBuilder->build($id,$name,$request->only(['name']));
        }
        catch (NotFoundHttpException $exception){
            return $notFoundResponseBuilder->build($name);
        }catch (\Throwable $exception){
            $finalName = $permission->name ?? $name;
            $logger->emergency(
                $translator->get(
                    'messages.log.update.permission.exceptionThrow',
                    ['id' => $id , 'name' => $finalName])
            );
            $exceptionHandler->report($exception);
            return $exceptionThrowResponseBuilder->build($id,$finalName,$request->only(['name']));
        }
    }
}
