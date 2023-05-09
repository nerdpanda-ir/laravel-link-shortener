<?php

namespace App\Http\Controllers\Dashboard\Permission;

use App\Contracts\Responses\Dashboard\Permission\Update\ExceptionThrow;
use App\Contracts\Responses\Dashboard\Permission\Update\Fail as FailResponseBuilder;
use App\Contracts\Responses\Dashboard\Permission\Update\Ok as OkResponseBuilder;
use App\Http\Controllers\Controller;
use App\Contracts\Requests\Dashboard\Permission\Update as Request;
use App\Contracts\PermissionModelContract as Permission;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Contracts\Responses\Dashboard\Permission\NotFound as NotFoundResponseBuilder;
use Psr\Log\LoggerInterface as Logger;
use App\Contracts\Exceptions\FailUpdate as FailUpdateException;
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
            $permission = $model->where('name','=',$name)->first(['name','id']);
            if (is_null($permission))
                throw $notFoundException;
            $data = array_merge($request->only(['name']),['updated_at'=>date('Y-m-d H:i:s')]);
            $permission->setRawAttributes($data);
            $updated = $permission->update();
            if (!$updated)
                throw $failUpdateException;
            $logger->info(
                $translator->get('messages.log.update.permission.ok', ['Permission' => $name])
            );
            return $okResponseBuilder->build($name);
        }catch (FailUpdateException $exception){
            $exception->setMessage(
                $translator->get('messages.log.update.permission.fail', ['permission' => $name])
            );
            $exceptionHandler->report($exception);
            return $failResponseBuilder->build($name,$request->only(['name']));
        }
        catch (NotFoundHttpException $exception){
            return $notFoundResponseBuilder->build($name);
        }catch (\Throwable $exception){
            $logger->emergency(
                $translator->get('messages.log.update.permission.exceptionThrow', ['permission' => $name])
            );
            $exceptionHandler->report($exception);
            return $exceptionThrowResponseBuilder->build($name,$request->only(['name']));
        }
    }
}
