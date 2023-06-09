<?php

namespace App\Providers\Services;

use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\AuthenticatedUser as Contract;
use App\Services\AuthenticatedUser as Service;
class AuthenticatedUserServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(Contract::class , Service::class);
        $this->callAfterResolving(
            Contract::class ,
            function (Contract $authenticatedUser , Application $container):void {
                $auth = $container->make(Factory::class);
                $user = $auth->guard('web')->user();
                if (!is_null($user))
                    $authenticatedUser->setUser($user);
            }
        );
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
