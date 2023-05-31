<?php

namespace App\Http\Controllers;

use App\Contracts\Model\Userable;
use App\Contracts\Redirectors\Home;
use App\Contracts\Services\DateService;
use App\Contracts\Services\ResponseVisitors\UserRegisterAction;
use App\Enums\UserRegisterStatus;
use App\Exceptions\FailCrud;
use App\Models\User;
use Illuminate\Hashing\HashManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Http\Requests\DoRegister as Request;
use App\Contracts\Exceptions\FailCrud as FailCrudExceptionContract;
use Psr\Log\LoggerInterface as Logger ;

class DoRegisterController extends Controller
{
    /**
     * @param User $user
     * */
    public function __invoke(
        Request $request,Userable $user , HashManager $hashManager , DateService $dateService , Logger $logger ,
        Home $homeRedirector , UserRegisterAction $userRegisterActionResponseVisitor ,
    ):RedirectResponse
    {
        try{
            $userFullName =  $request->get('full_name');
            // @todo create flyweight for date service
            $userRegisterActionResponseVisitor->setRedirectResponse($homeRedirector->redirect());
            $userRegisterActionResponseVisitor->setUserfullName($userFullName);
            $user->setRawAttributes([
                'name'=> $userFullName, 'user_id' => $request->get('username') ,
                'email' => $request->get('email') , 'created_at' => $dateService->date() ,
                'password'=> $hashManager->make($request->get('password'))
            ]);
            $saved = $user->save();
            if (!$saved)
                throw new FailCrud();
            return $userRegisterActionResponseVisitor->ok();
        }catch (FailCrudExceptionContract $exception){
            $exception->setMessage(trans('log.register.fail'));
            $exception->setContext(['user'=> $user]);
            report($exception);
            return $userRegisterActionResponseVisitor->fail();
        }catch (\Throwable $exception){
            $logger->emergency(
                trans('log.register.throw_exception') , ['userModel'=> $user]
            );
            report($exception);
            return $userRegisterActionResponseVisitor->throwException($dateService->date());
        }
    }
}
