<?php

namespace App\Http\Controllers\Dashboard\Role;

use App\Contracts\Exceptions\FailCrud;
use App\Contracts\Services\DateService;
use App\Http\Controllers\Controller;
use App\Contracts\Requests\Dashboard\Role\Update as Request;
use App\Http\Requests\Dashboard\Role\Update;
use App\Models\Permission;
use App\Models\Role;
use App\Services\ResponseVisitors\UpdateAction;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Contracts\Model\Role as RoleModel;
use App\Contracts\Model\Permission as PermissionModel;
use Illuminate\Database\ConnectionResolverInterface as DatabaseManager;
use Illuminate\Contracts\Auth\Factory as Auth;
use App\Contracts\Redirectors\Role as Redirector;
use App\Contracts\Services\ResponseVisitors\UpdateAction as ResponseVisitor;
use Psr\Log\LoggerInterface as Logger;
use App\Contracts\Services\ResponseVisitors\NotFound as NotFoundVisitor;
class UpdateController extends Controller
{

    /**
     * @param Role $roleModel
     * @param Permission $permissionModel
     * @param Update $request
     * @param \Illuminate\Database\DatabaseManager $databaseManager
     * @param UpdateAction $responseVisitor
     */
    public function __invoke(
        string $id , string $name , Request $request , RoleModel $roleModel , NotFoundHttpException $notFoundException ,
        PermissionModel $permissionModel , DatabaseManager $databaseManager , DateService $dateService , Auth $auth ,
        FailCrud $failCrudException , Redirector $redirector , ResponseVisitor $responseVisitor , Logger $logger ,
        Translator $translator , ExceptionHandler $exceptionHandler , NotFoundVisitor $notFoundVisitor ,

    ):RedirectResponse
    {
        try {
            $role = $roleModel->find($id,['id','name']);
            if (is_null($role))
                throw $notFoundException;
            $now = $dateService->date();
            $roleData = array_merge($request->only('name'),['updated_at'=>$now]);
            foreach ($roleData as $dataKey => $data )
                $role->setAttribute($dataKey,$data);
            $hasPermissions = $request->has('permissions') && count($request->get('permissions'))>=1;
            $permissionIds = [];
            $permissionIdsWithPayload = [];
            if ($hasPermissions){
                $permissions = $permissionModel->whereIn('name',$request->get('permissions'))
                                               ->get(['id']);
                $permissionIds = $permissions->pluck('id');
                $permissionIdsWithPayload = $permissionIds->map(
                    fn(int $item)=>[
                        'permission_id'=>$item , 'created_at'=> $now ,
                        'created_by'=> $auth->guard('web')->user()->id
                    ]
                );
                $permissionIdsWithPayload = $permissionIdsWithPayload->toArray();
            }
            $rolOldName = $role->getOriginal('name');
            $databaseManager->beginTransaction();
            $saved = $role->update();
            if (!$saved)
                throw $failCrudException;
            $syncResult = $role->permissions()->sync($permissionIdsWithPayload);
            $databaseManager->commit();

            return $responseVisitor->ok($redirector->viewAll() , "$rolOldName role");
        }catch (NotFoundHttpException $notFoundException){
            return $notFoundVisitor->visit(
                $redirector->viewAll(),"role with name -> $name and id -> $id "
            );
        }catch (FailCrud $exception){
            $logger->emergency(
                $translator->get('log.crud.updated.fail', ['item' => 'role']) ,
                ['id'=> $id , 'name'=> $rolOldName]
            );
            return $responseVisitor->fail(
                $redirector->viewAll() , "role with id : $id and name $rolOldName"
            );
        }catch (\Throwable $exception){
            $finalName = $rolOldName ?? $name;
            $logger->emergency(
                $translator->get('log.crud.updated.throw_exception', ['item' => 'role']) ,
                ['id'=> $id , 'name'=> $finalName ]
            );
            $exceptionHandler->report($exception);
            return $responseVisitor->throwException(
                $redirector->viewAll() , "role with id -> $id and name $finalName"
            );
        }
    }
}
