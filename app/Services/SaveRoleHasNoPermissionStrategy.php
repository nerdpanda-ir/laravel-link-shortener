<?php

namespace App\Services;

use App\Contracts\Exceptions\FailCrud;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Contracts\Services\SaveRoleHasNoPermissionStrategy as Contract;
class SaveRoleHasNoPermissionStrategy extends SaveRoleStrategy implements Contract
{
    public function save(): RedirectResponse
    {
        try {
            $messageItem = $this->getRequest()->name." role with permissions -> [ ]";
            $payload = [
                'created_at'=> $this->getDateService()->date() ,
                'created_by' => $this->getAuthManager()->guard('web')->user()->id ,
            ];
            $this->getRoleModel()
                ->setRawAttributes(
                    array_merge(['name'=>$this->getRequest()->name],$payload)
            );
            $saved = $this->getRoleModel()->save();
            if (!$saved)
                throw $this->getFailCrudException();
            return $this->getResponseVisitor()
                        ->ok($this->getRedirector()->viewAll() , $messageItem);
        }catch (FailCrud $failCrudException){
            $failCrudException->setMessage(
                $this->getTranslator()->get('log.crud.save.throw_exception', ['item' => "role"])
            );
            $failCrudException->setContext(['name'=> $this->getRequest()->name , 'permissions'=> [] ]);
            $this->getExceptionHandler()->report($failCrudException);
            return $this->getResponseVisitor()->fail(
                    $this->getRedirector()->create($this->getRequest()->only('name')),$messageItem
            );
        }catch (\Throwable $throwable){
            $this->getLogger()->emergency(
                    $this->getTranslator()->get('exceptions.fail_crud', ['action' => "save $messageItem" ])
            );
            $this->getExceptionHandler()->report($throwable);
            return $this->getResponseVisitor()->throwException(
                $this->getRedirector()->create($this->getRequest()->only('name')) , $messageItem
            );
        }
    }
}
