<?php

namespace App\Providers;

use App\Contracts\Model\Userable as Contract;
use App\Models\User as Model;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserableServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Model::class);
        $this->app->alias(Contract::class,'model.contract.user');
    }
    public function provides():array
    {
        return [
            Contract::class,'model.contract.user'
        ];
    }
}
