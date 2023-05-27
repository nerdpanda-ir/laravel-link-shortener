<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Contracts\Model\Userable;
use App\Contracts\Requests\Dashboard\User\Save as Request;
use App\Contracts\Services\ResponseVisitors\SaveAction as SaveResponseVisitor;
use App\Exceptions\FailCrud;
use App\Contracts\Exceptions\FailCrud as FailCrudContract;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ResponseVisitors\SaveAction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SaveController extends Controller
{
    /**
     * @param User $user
     * @param \Illuminate\Http\Request $request
     * @param SaveAction $saveVisitor
     * */
    public function __invoke(
        Request $request , Userable $user , SaveResponseVisitor $saveVisitor
    ):RedirectResponse
    {
        try {
            $attributeMap = ['full_name'=>'name','email'=>'email','username'=>'user_id'];
            $inputs = $request->only( array_keys($attributeMap) );
            $now = \DateServiceFacade::date();

            foreach ($inputs as $input_key => $input)
                $user->{$attributeMap[$input_key]} = $input;

            if ($request->has('password'))
                $user->password = Hash::make($request->get('password'));
            else
                $user->password = Hash::make(Str::random(rand(10,35)));

            if ($request->has('email_verified'))
                $user->email_verified_at = $now;
            $user->created_at = $now ;

            $saved = false;
            if ($request->has('roles')) {
                DB::beginTransaction();
                $saved = $user->save();
                if (!$saved)
                    throw new FailCrud();
                /** @var Collection $roles*/
                $roles = \RoleModel::whereIn('name',$request->get('roles'))->get('id');
                $roleIds = $roles->pluck('id');
                $user->roles()->attach($roleIds,[
                    'created_at'=>$now , 'created_by'=> \AuthenticatedUser::getUser()->id
                ]);
                DB::commit();
            }else {
                $saved = $user->save();
                if (!$saved)
                    throw new FailCrud();
            }
            return $saveVisitor->ok(\UserRedirector::viewAll(),"user with name :  {$user->name} ");
        }catch (FailCrudContract $exception){
            $exception->setMessage(
                trans('log.crud.save.fail', ['item' => 'user'])
            );
            $exception->setContext(['user'=> $user]);
            report($exception);
        } catch (\Throwable $exception){
            $requestInputs =  $request->except('_token');
            Log::emergency(
                trans('log.crud.save.throw_exception', ['item' => 'user']) , $requestInputs
            );
            report($exception);
            return $saveVisitor->throwException(\UserRedirector::viewAll(),"user with");
        }
    }
}
