<?php

namespace App\Http\Controllers\Dashboard\Role;

use App\Contracts\Model\Permission;
use App\Contracts\Model\Role;
use App\Contracts\Services\ResponseVisitors\NotFound;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Relation;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Psr\Log\LoggerInterface as Logger;
use App\Contracts\Services\ResponseVisitors\EditAction as ResponseVisitor;
use App\Contracts\Redirectors\Role as Redirector;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Contracts\View\Factory as ViewFactory;

class EditController extends Controller
{
    /**
     * @param \App\Models\Role $roleModel
     * @param \App\Models\Permission $permissionModel
     * */
    public function __invoke(
        string $id , string $name , Translator $translator , Logger $logger , ExceptionHandler $exceptionHandler ,
        ResponseVisitor $responseVisitor , Redirector $redirector , Role $roleModel , Permission $permissionModel ,
        ViewFactory $viewFactory , NotFound $notFoundResponseVisitor , NotFoundHttpException $notFoundException,
    ):RedirectResponse|View {
        $result = null ;
        try {
            $role = $roleModel->find($id,['id','name']);
            if (is_null($role))
                throw $notFoundException;
            $role->load([
                'permissions'=> function (Builder $relation){
                    /** @var BelongsToMany $relation */
                    $relation->latest('permission_role.created_at');
                    $relation->orderBy('permissions.name','asc');
                    $relation->select(['permissions.name','permissions.id']);
                }
            ])->loadCount(['users','permissions']);
            $exceptPermissions = $role->permissions->pluck('id')->toArray();
            $permissions = $permissionModel->whereNotIn('id',$exceptPermissions)
                                           ->latest('created_at')->orderBy('name','asc')
                                           ->get('name');
            $result = $viewFactory->make(
                'page.dashboard.role.edit',compact('role','permissions')
            );
        }catch (NotFoundHttpException $exception){
            $result = $notFoundResponseVisitor->visit(
                $redirector->viewAll(),"role with id -> $id and with name -> $name"
            );
        } catch (\Throwable $exception){
            $finalRoleName = $role->name?? $name;
            $logger->emergency(
                $translator->get('log.crud.edit.throw_exception', ['item' => 'role !!!']) ,
                ['id'=> $id , 'name'=> $finalRoleName]
            );
            $exceptionHandler->report($exception);
            $result = $responseVisitor->throwException(
                $redirector->viewAll(),"role with name -> $finalRoleName and with id -> $id"
            );
        } finally {
            return $result;
        }
    }
}
