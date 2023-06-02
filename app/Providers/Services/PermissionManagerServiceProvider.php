<?php

namespace App\Providers\Services;

use App\Contracts\Services\AuthenticatedUser;
use App\Contracts\Services\PermissionManager as Contract;
use App\Services\LazyPermissionManagerStrategyImp as Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PermissionManagerServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(Contract::class,Service::class);
        $this->app->afterResolving(
            Contract::class,
            function (Contract $permissionManager , Application $container){
                $user = $container->get(AuthenticatedUser::class)->getUser();
                if (!is_null($user))
                    $permissionManager->setUser($user);
            }
        );
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
