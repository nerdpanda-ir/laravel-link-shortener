<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Contracts\Services\UserUpdateStrategyFactory;
use App\Exceptions\FailCrud;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Contracts\Requests\Dashboard\User\Update as Request;
use App\Contracts\Exceptions\FailCrud as FailCrudContract;
class UpdateController extends Controller
{

    /**
     * @param string $id
     * @param string $name
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function __invoke(
        string $id , string $name , Request $request , UserUpdateStrategyFactory $updateStrategyFactory
    ):RedirectResponse
    {
        try {
            /** @var User $user */
            $user = \UserModel::find($id,['name','id','email_verified_at']);
            if (is_null($user))
                throw new NotFoundHttpException();
            $now = \DateServiceFacade::date();
            /** @var User $authenticatedUser */
            $authenticatedUser = \AuthenticatedUser::getUser();
            $hasEmailVerifiedInput = $request->has('email_verified');
            $userRealName = $user->name;

            $data = [
                'name'=> $request->get('full_name') , 'user_id' => $request->get('username') ,
                'email' => $request->get('email') , 'updated_at' => $now , 'id'=> $user->id ,
            ];
            if ($request->has('password') and !is_null($request->get('password')))
                $data['password'] = Hash::make($request->get('password'));

            if($authenticatedUser->can('verify-user-email') && !$hasEmailVerifiedInput &&
                !is_null($user->email_verified_at))
                    $data['email_verified_at'] = null;
            elseif($hasEmailVerifiedInput && is_null($user->email_verified_at))
                    $data['email_verified_at'] = $now;

            $user->setRawAttributes($data);

            $updateStrategy = $updateStrategyFactory->make();
            $updateStrategy->setUser($user);
            $updated = $updateStrategy->updateCommand();;
            return \UpdateActionResponseVisitor::ok(\UserRedirector::viewAll(),"user $name");
        }catch (NotFoundHttpException $exception){
            return \NotFoundResponseVisitor::visit(
                \UserRedirector::viewAll(),"user with id $id and with name $name"
            );
        }catch (FailCrudContract $exception){
            $exception->setMessage(trans('log.crud.updated.fail', ['item' => 'user']));
            $exceptionContext = ['user'=> $user];
            if ($authenticatedUser->can('attach-role-to-user'))
                $exceptionContext['roles'] = (($request->has('roles')) ? $request->get('roles') : []);
            $exception->setContext($exceptionContext);
            report($exception);
            return \UpdateActionResponseVisitor::fail(
                \UserRedirector::edit($id,$name,$request->except(['_token','_method'])) ,
                "user with name $userRealName"
            );
        }catch (\Throwable $exception){
            // log ->
            Log::emergency(
                trans('log.crud.updated.throw_exception', ['item' => 'user']),
                ((isset($user)) ? ['user'=> $user] : ['id'=>$id , 'name'=> $name ])
            );
            //report exception
            report($exception);
            // redirect
            return \UpdateActionResponseVisitor::throwException(
                \UserRedirector::edit($id,$name,$request->except(['_token','_method'])) ,
                'user '.($user->name ?? $name)
            );

        }
    }
}
