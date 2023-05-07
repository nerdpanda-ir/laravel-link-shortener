<?php

namespace App\Http\Controllers\Dashboard\Permission;

use App\Contracts\Exceptions\FailStore;
use App\Exceptions\FailStoreException;
use App\Http\Controllers\Controller;
use App\Contracts\Requests\Dashboard\Permission\StoreRequest as Request;
use App\Contracts\PermissionModelContract as Permission;
use Illuminate\Contracts\Translation\Translator;
use mysql_xdevapi\Exception;
use Psr\Log\LoggerInterface as Logger;
use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Symfony\Component\HttpFoundation\RedirectResponse as BaseResponse;
use Illuminate\Contracts\Auth\Factory as Auth;

class StoreController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Permission $permission
     */
    public function __invoke(
        Request $request , Permission $permission  , Response $response ,
        Logger $logger , Translator $translator , Auth $auth , FailStore $failStore
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
            return $response->redirectToRoute('dashboard.home')
                    ->with(
                        'system.messages.ok',
                        [$translator->get('messages.store.permission.success', ['permission' => $request->name])]
                    );

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
