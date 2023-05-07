<?php

namespace App\Http\Controllers\Dashboard\Permission;

use App\Contracts\Exceptions\FailStore;
use App\Contracts\PermissionModelContract as Permission;
use App\Contracts\Requests\Dashboard\Permission\StoreRequest as Request;
use App\Contracts\Responses\Dashboard\Permission\Store\StoreBuilder;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Contracts\Translation\Translator;
use Psr\Log\LoggerInterface as Logger;
use Symfony\Component\HttpFoundation\RedirectResponse as BaseResponse;

class StoreController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Permission $permission
     */
    public function __invoke(
        Request $request , Permission $permission  , Response $response ,
        Logger $logger , Translator $translator , Auth $auth , FailStore $failStore ,
        StoreBuilder $storeResponseBuilder ,
    ):BaseResponse
    {
        try {
            $data = [
                'created_by'=>  $auth->guard('web')->user()->id ,
                'created_at' => date("Y-m-d H:i:s") ,
            ];
            $data = array_merge($request->only('name'), $data);
            $permission->setRawAttributes($data);
            $created = $permission->save();
            if (!$created)
                throw $failStore;
            return $storeResponseBuilder->build($request->name);
        } catch (FailStore $exception){
            $exception->setMessage(
                $translator->get('messages.store.permission.fail', ['permission' => $request->name])
            );
            report($exception);
            return $response->redirectToRoute('dashboard.permission.create')
                        ->withInput($request->only('name'))
                        ->with('system.messages.error',[$exception->getMessage()]);
        } catch (\Throwable $throwable){
            $logger->emergency(
                $translator->get('messages.log.store.permission.exceptionThrow')
            );
            report($throwable);
            return $response->redirectToRoute('dashboard.permission.create')
                                ->withInput($request->only('name'))
                                ->with('system.messages.error',[
                                    $translator->get('messages.store.permission.exceptionThrow')
                                ]);
        }
    }
}
