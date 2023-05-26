<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Contracts\Services\AuthenticatedUser;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CreateController extends Controller
{
    public function __invoke(
        AuthenticatedUser $authenticatedUserService
    ):RedirectResponse|View
    {
        try {
            $authenticatedUser = $authenticatedUserService->getUser();
            $permissions = [
                'can_attach_role_to_user' => $authenticatedUser->can('attach-role-to-user') ,
                'can_set_password_for_user' => $authenticatedUser->can('set-password-for-user') ,
                'can_verified_user_email' => $authenticatedUser->can('verified_user_email') ,
            ];
            $view  = \view('page.dashboard.user.create',$permissions);
            if($permissions['can_attach_role_to_user'])
                $view->with('roles',\RoleModel::all(['name']));
            return $view;
        }catch (\Throwable $exception){
            Log::emergency(
                trans('log.crud.create.throw_exception', ['item' => 'user'])
            );
            report($exception);
            $response = \UserRedirector::viewAll();
            return \CreateActionResponseVisitor::throwException(
                $response , 'user'
            );
        }
    }
}
