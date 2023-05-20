<?php

namespace App\Services;

use App\Contracts\Exceptions\FailCrud;
use App\Contracts\Model\Permission;
use App\Contracts\Model\Role;
use App\Contracts\Redirectors\Role as Redirector;
use App\Contracts\Services\DateService;
use App\Services\ResponseVisitors\SaveAction as ResponseVisitor;
use App\Traits\DatabaseManagerGetterable;
use App\Traits\PermissionModelGetterable;
use Illuminate\Contracts\Auth\Factory as AuthManager;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface as Logger;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Contracts\SaveRoleHasPermissionStrategy as Contract ;
use Illuminate\Database\ConnectionResolverInterface as DatabaseManager;
class SaveRoleHasPermissionStrategy extends SaveRoleStrategy implements Contract
{
    use DatabaseManagerGetterable , PermissionModelGetterable ;
    protected Permission $permissionModel;
    protected DatabaseManager $databaseManager;
    public function __construct(
        Logger $logger, Translator $translator, Request $request, ExceptionHandler $exceptionHandler,
        ResponseVisitor $responseVisitor, Redirector $redirector, FailCrud $failCrudException, Role $role ,
        AuthManager $auth , DateService $dateService , Permission $permission , DatabaseManager $databaseManager ,
    )
    {
        parent::__construct(
            $logger, $translator, $request , $exceptionHandler, $responseVisitor, $redirector ,
            $failCrudException, $role, $auth, $dateService
        );
        $this->permissionModel = $permission ;
        $this->databaseManager = $databaseManager;
    }

    public function save(): RedirectResponse
    {
        try {
            $itemMessage = "role with name -> {$this->getRequest()->name} and permissions -> [ "
                           .implode(',',$this->getRequest()->permissions).' ] ';
            $inputs = $this->getRequest()->only(['name','permissions']);
            $insertPayload = [
                'created_at'=> $this->getDateService()->date() ,
                'created_by'=> $this->getAuthManager()->guard('web')->user()->id
            ];
            $this->getRoleModel()->setRawAttributes(
                array_merge($this->getRequest()->only('name'),$insertPayload)
            );

            $this->getDatabaseManager()->beginTransaction();
            $saved = $this->getRoleModel()->save();
            if (!$saved)
                throw $this->getFailCrudException();
            $permissions = $this->getPermissionModel()->whereIn('name',$this->getRequest()->permissions)->get(['id']);
            $this->getRoleModel()->permissions()->attach($permissions,$insertPayload);
            $this->getDatabaseManager()->commit();

            return $this->getResponseVisitor()->ok($this->getRedirector()->viewAll() , $itemMessage);

        }catch (FailCrud $failCrudException){
            $failCrudException->setMessage(
                $this->getTranslator()->get('log.crud.save.fail', ['item' => 'role'])
            );
            $failCrudException->setContext([
                'name'=> $this->getRequest()->name , 'permissions'=> $this->getRequest()->permissions
            ]);
            $this->getExceptionHandler()->report($failCrudException);
            return $this->getResponseVisitor()->fail(
                $this->getRedirector()->create($this->getRequest()->only(['name','permissions'])) , $itemMessage
            );
        }catch (\Throwable $exception){
            $this->getLogger()->emergency(
                $this->getTranslator()->get('exceptions.fail_crud', ['action' => 'save role']) , $inputs
            );
            $this->getExceptionHandler()->report($exception);
            return $this->getResponseVisitor()->throwException(
                    $this->getRedirector()
                         ->create(
                             $this->getRequest()->only(['name','permissions'])) , "save $itemMessage"
                        );
        }
    }
}
