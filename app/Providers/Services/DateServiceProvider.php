<?php

namespace App\Providers\Services;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\DateService as Contract;
use App\Services\DateService as Service;
class DateServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(Contract::class,Service::class);
        $this->app->alias(Contract::class,'contract.service.dateService');
    }
    public function provides():array
    {
        return [
            Contract::class, 'contract.service.dateService'
        ];
    }
}
