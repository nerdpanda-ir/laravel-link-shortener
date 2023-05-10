<?php

namespace App\Providers\Services\Gates;

use App\Contracts\Services\Gates\Permission as Contract;
use App\Services\Gates\Permission as Service;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(Contract::class , Service::class);
    }

    public function provides():array
    {
        return [
            Contract::class ,
        ];
    }
}
