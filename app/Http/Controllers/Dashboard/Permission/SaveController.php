<?php

namespace App\Http\Controllers\Dashboard\Permission;

use App\Contracts\Exceptions\FailCrud;
use App\Contracts\Model\Permission as Permission;
use App\Contracts\Requests\Dashboard\Permission\StoreRequest as Request;
use App\Contracts\Responses\Dashboard\Permission\Store\ExceptionHappenBuilder;
use App\Contracts\Responses\Dashboard\Permission\Store\StoreBuilder;
use App\Contracts\Services\DateService;
use App\Contracts\Services\ResponseVisitors\SaveAction;
use App\Http\Controllers\Controller;
use App\Http\Responses\Dashboard\Permission\Store\FailStoreBuilder;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Contracts\Translation\Translator;
use Psr\Log\LoggerInterface as Logger;
use Symfony\Component\HttpFoundation\RedirectResponse as BaseResponse;
use App\Contracts\Redirectors\Dashboard\Permission as Redirector;
class SaveController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Permission $permission
     */
    public function __invoke(
        Request    $request , Permission $permission , DateService $dateService ,
        Logger     $logger , Translator $translator , Auth $auth , FailCrud $failStore ,
        SaveAction $visitor , Redirector $redirector
    ):BaseResponse
    {
        try {
            $data = [
                'created_by'=>  $auth->guard('web')->user()->id ,
                'created_at' => $dateService->date() ,
            ];
            $data = array_merge($request->only('name'), $data);
            $permission->setRawAttributes($data);
            $created = $permission->save();
            if (!$created)
                throw $failStore;
            return $visitor->ok($redirector->viewAll(),"permission with name : $request->name");
        } catch (FailCrud $exception){
            $exception->setContext(['permission' => $request->name]);
            $exception->setMessage(
                $translator->get('log.crud.save.fail',['item' => 'permission'])
            );
            report($exception);
            return $visitor->fail(
                $redirector->create($request->only('name')) ,
                'permission with name -> '. $request->name
            );
        } catch (\Throwable $throwable){
            $logger->emergency(
                $translator->get(
                    'log.crud.save.throw_exception', ['item' => 'permission with name'. $request->name]
                )
            );
            report($throwable);
            return $visitor->throwException(
                $redirector->create($request->only('name')) , 'permission with name : '.$request->name
            );
        }
    }
}
