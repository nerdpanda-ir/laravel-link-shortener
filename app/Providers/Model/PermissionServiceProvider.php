<?php

namespace App\Providers\Model;

use App\Contracts\Model\Permission as Contract;
use App\Models\Permission as Model;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Model::class);
        $this->app->alias(Contract::class , 'contract.model.permission');
    }
    public function provides():array
    {
        return [
            Contract::class , 'contract.model.permission'
        ];
    }

}
