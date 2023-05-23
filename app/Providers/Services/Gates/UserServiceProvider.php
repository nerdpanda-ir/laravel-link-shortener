<?php

namespace App\Providers\Services\Gates;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\Gates\User as Contract;
use App\Services\Gates\User as Gate;
class UserServiceProvider extends ServiceProvider implements DeferrableProvider
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
