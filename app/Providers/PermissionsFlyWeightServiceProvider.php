<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\PermissionsFlyWeightContract as Contract;
use App\Services\PermissionsFlyWeightService as Service;
class PermissionsFlyWeightServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(Contract::class,Service::class);
        $this->app->afterResolving(Contract::class,function (Contract $service,Application $container){
            /** @var Factory $auth*/
            $auth = $container->get('auth');
            $user = $auth->guard('web')->user();
            $service->setUser($user);
        });
    }

    public function boot(): void
    {
    }
    public function provides():array
    {
        return [
            Contract::class
        ];
    }
}
