<?php

namespace App\Services;
use App\Contracts\Exceptions\FailCrud;
use App\Contracts\Model\Role;
use App\Contracts\Redirectors\Role as Redirector;
use App\Contracts\Services\DateService;
use App\Contracts\Services\SaveRoleStrategy as Contract;
use App\Services\ResponseVisitors\SaveAction as ResponseVisitor;
use App\Traits\AuthManagerGetterable;
use App\Traits\DateServiceGetterable;
use App\Traits\ExceptionHandlerGetterable;
use App\Traits\FailCrudExceptionGetterable;
use App\Traits\LoggerGetterable;
use App\Traits\RequestGetterable;
use App\Traits\ResponseVisitorGetterable;
use App\Traits\RoleModelGetterable;
use App\Traits\Services\RedirectorGetterable;
use App\Traits\TranslatorGetterable;
use Illuminate\Contracts\Auth\Factory as AuthManager;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use Psr\Log\LoggerInterface as Logger;
use Illuminate\Http\Request;


abstract class SaveRoleStrategy implements Contract
{
    use LoggerGetterable , TranslatorGetterable , RequestGetterable , ExceptionHandlerGetterable ;
    use ResponseVisitorGetterable , RedirectorGetterable , FailCrudExceptionGetterable , DateServiceGetterable;
    use AuthManagerGetterable , RoleModelGetterable ;
    protected  Logger $logger;
    protected Translator $translator;
    protected Request $request;
    protected ExceptionHandler $exceptionHandler ;
    protected ResponseVisitor $responseVisitor;
    protected Redirector $redirector;
    protected FailCrud $failCrudException;
    protected Role $roleModel;
    protected AuthManager $auth;
    protected DateService $dateService;
    public function __construct(
        Logger $logger , Translator $translator , Request $request ,  ExceptionHandler $exceptionHandler ,
        ResponseVisitor $responseVisitor ,  Redirector $redirector , FailCrud $failCrudException , Role $role ,
        AuthManager $auth , DateService $dateService ,
    )
    {
        $this->logger = $logger ;
        $this->translator = $translator ;
        $this->request = $request ;
        $this->exceptionHandler = $exceptionHandler ;
        $this->responseVisitor = $responseVisitor ;
        $this->redirector = $redirector ;
        $this->failCrudException = $failCrudException ;
        $this->roleModel = $role ;
        $this->auth = $auth ;
        $this->dateService = $dateService ;
    }
}
