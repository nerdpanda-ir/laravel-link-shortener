<?php

namespace App\Providers\Services\Gates;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\Gates\Role as Contract;
use App\Services\Gates\Role as Gate;
class RoleServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(Contract::class,Gate::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
