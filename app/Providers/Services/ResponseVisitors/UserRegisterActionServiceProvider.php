<?php

namespace App\Providers\Services\ResponseVisitors;

use App\Contracts\Redirectors\Home;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\ResponseVisitors\UserRegisterAction as Contract;
use App\Services\ResponseVisitors\UserRegisterAction as ResponseVisitor;
class UserRegisterActionServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,ResponseVisitor::class);
        $this->app->afterResolving(
            Contract::class ,
            function (Contract $responseVisitor , Application $container)
            {
                /** @var Request $request */
                $request = $container->get('request');
                /** @var \App\Http\Redirector\Home $request */
                $redirector = $container->get(Home::class);

                $responseVisitor->setUserfullName($request->get('full_name'));
                $responseVisitor->setRedirectResponse($redirector->redirect());
            }
        );
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
