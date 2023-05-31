<?php

namespace App\Services\ResponseVisitors;
use App\Contracts\Services\ResponseVisitors\UserRegisterActionResponseVisitor as Contract;
use App\Traits\TranslatorGetterable;
use Illuminate\Contracts\Translation\Translator;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserRegisterActionResponseVisitor implements Contract
{
    use TranslatorGetterable;
    protected RedirectResponse $response;
    protected string $userFullName;
    protected Translator $translator;
    public function __construct(Translator $translator)
    {
        $this->translator = $translator ;
    }

    public function setRedirectResponse(RedirectResponse $response):void
    {
        $this->response = $response;
    }

    public function getRedirectResponse(): RedirectResponse
    {
        return $this->response;
    }

    public function setUserfullName(string $fullName):void
    {
        $this->userFullName = $fullName ;
    }

    public function getUserFullName(): string
    {
        return $this->userFullName;
    }

    public function ok(): RedirectResponse
    {
        return $this->getRedirectResponse()->with(
            'system.messages.ok',[
                $this->getTranslator()->get(
                    'messages.auth.register.ok', [
                        'fullName' => $this->getUserFullName()
                    ])
            ]);
    }

    public function fail(): RedirectResponse
    {
        return $this->getRedirectResponse()->with(
            'system.messages.error',[
            $this->getTranslator()->get(
                'messages.auth.register.fail', [
                'fullName' => $this->getUserFullName()
            ])
        ]);
    }

    public function ThrowException(string $date): RedirectResponse
    {
        return $this->getRedirectResponse()->with(
            'system.messages.error',[
            $this->getTranslator()->get(
                'messages.auth.register.throw_exception', [
                'fullName' => $this->getUserFullName() , 'date' => $date
            ])
        ]);
    }

}
