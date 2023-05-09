<?php

namespace App\Providers;

use App\Contracts\Model\Userable;
use App\Models\User;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserableServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Userable::class,User::class);
        $this->app->alias(Userable::class,'model.contract.user');
    }
    public function provides():array
    {
        return [
            Userable::class,'model.contract.user'
        ];
    }
}
