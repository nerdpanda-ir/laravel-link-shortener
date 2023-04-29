<?php
namespace NerdPanda\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use NerdPanda\Contracts\NoDependencyFoundForSeedingContract as Contract;
use NerdPanda\Exceptions\NoDependencyFoundForSeedingException as Entity;

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
    public function boot():void {
        $this->publishes([
            dirname(__DIR__,3).'/exports/Exceptions' => app_path('Exceptions')
        ],'noDependencyFoundException.exceptions');
    }
    public function provides():array
    {
        return [
            Contract::class,'contract.exception.noDependencyFound'
        ];
    }
}
