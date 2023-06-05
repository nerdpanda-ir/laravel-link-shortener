<?php

namespace App\Services;
use App\Contracts\Redirectors\Dashboard\Permission;
use App\Contracts\Services\SystemRedirectorsFacade as Contract;
use App\Traits\ApplicationGetterable;
use Illuminate\Contracts\Foundation\Application;

class SystemRedirectorsFacade implements Contract
{
    use ApplicationGetterable;
    protected Application $application;
    public function __construct(Application $application)
    {
        $this->application = $application ;
    }

    public function permission(): Permission
    {
        return $this->getApplication()
                    ->make('contract.redirector.permission');
    }
}
