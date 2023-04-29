<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\NoDependencyFoundForSeedingContract as Contract;
use App\Exceptions\NoDependencyFoundForSeedingException as Entity;

class NoDependencyFoundExceptionServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(
            Contract::class , Entity::class
        );
        $this->app->alias(
            Contract::class,'contract.exception.noDependencyFound'
        );
    }

    public function provides():array
    {
        return [
            Contract::class,'contract.exception.noDependencyFound'
        ];
    }
}
