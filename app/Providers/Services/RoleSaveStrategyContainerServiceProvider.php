<?php

namespace App\Providers\Services;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\RoleSaveStrategyContainer as Contract;
use App\Services\RoleSaveStrategyContainer as Service;
class RoleSaveStrategyContainerServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Service::class );
        $this->app->afterResolving(
            Contract::class ,
                    function (Contract $strategyContainer , Application $application){
                        $request = $this->app->make(Request::class);
                        $strategyName = 'contract.service.save_role_has_permission_strategy';
                        if (!$request->has('permissions'))
                            $strategyName = 'contract.service.save_role_has_no_permission_strategy';
                        $strategyContainer->setStrategy($application->make($strategyName));
                    }
        );
    }

    public function boot(): void
    {
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
