<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EditController extends Controller
{

    /**
     * @param string $id
     * @param string $name
     * @return View|RedirectResponse
     */
    public function __invoke(
        string $id , string $name ,
    ):View|RedirectResponse
    {
        try {
            /** @var User $authenticatedUser */
            $authenticatedUser = \AuthenticatedUser::getUser();
            $userColumns = ['id','name','email','user_id'];

            if($authenticatedUser->can('verify-user-email'))
                $userColumns[] = 'email_verified_at';

            /** @var User|null $user*/
            $user = \UserModel::find($id,$userColumns);
            if (is_null($user))
                throw new NotFoundHttpException();

            Session::flash('old_data_for_edit',['username'=> $user->user_id , 'email'=> $user->email]);
            $viewName = 'page.dashboard.user.edit';
            $viewPayload = [
                'user'=> $user ,
                'can_set_password_for_user'=> $authenticatedUser->can('set-password-for-user')
            ];

            if($authenticatedUser->cant('attach-role-to-user'))
                return \view($viewName,$viewPayload);

            $user->load('roles:roles.id,roles.name');

            $roleExceptIds = [];
            if ($user->getRelation('roles')->isNotEmpty())
                $roleExceptIds = $user->getRelation('roles')->pluck('id');
            $roles = \RoleModel::whereNotIn('id',$roleExceptIds)->get(['name']);

            $viewPayload['roles'] = $roles;
            return \view($viewName,$viewPayload);
        }catch (NotFoundHttpException $exception){
            return \NotFoundResponseVisitor::visit(
                \UserRedirector::viewAll() , "user $name"
            );
        }catch (\Throwable $exception){
            $context = null ;
            if (isset($user))
                $context = ['model' => $user];
            else
                $context = ['id'=> $id , 'name'=> $name];
            Log::emergency(
                trans('log.crud.edit.throw_exception', ['item' => 'user']) ,
                $context
            );
            report($exception);
            return \EditActionResponseVisitor::throwException(
                \UserRedirector::viewAll(),'user ' . ($user->name ?? $name)
            );
        }
    }
}
