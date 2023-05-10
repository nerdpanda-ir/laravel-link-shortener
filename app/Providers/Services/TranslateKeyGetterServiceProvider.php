<?php

namespace App\Providers\Services;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\TranslateKeyGetter as Contract;
use App\Services\TranslateKeyGetter as Service;
class TranslateKeyGetterServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(Contract::class,Service::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
