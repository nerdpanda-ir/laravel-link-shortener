<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Exceptions\FailCrud;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Contracts\Exceptions\FailCrud as FailCrudContract;
class DeleteController extends Controller
{
    public function __invoke(string $id , string $name):RedirectResponse
    {
        try {
            $user = \UserModel::find($id,['id','name']);
            if (!$user)
                throw new NotFoundHttpException();
            $deleted = $user->delete();
            if (!$deleted)
                throw new FailCrud();
            return \DeleteActionResponseVisitor::ok(
                \UserRedirector::viewAll() , 'user with name '.$user->name
            );
        }catch (NotFoundHttpException $exception){
            return \NotFoundResponseVisitor::visit (\UserRedirector::viewAll() , "user $name");
        }catch (FailCrudContract $exception){
            $exception->setMessage(trans('log.crud.delete.fail', ['item' => 'user']));
            $exception->setContext(['user'=>$user]);
            report($exception);
            return  \DeleteActionResponseVisitor::fail(
                \UserRedirector::viewAll() , "user with name $user->name"
            );
        }
    }
}
