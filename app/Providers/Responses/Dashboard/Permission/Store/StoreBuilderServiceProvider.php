<?php

namespace App\Providers\Responses\Dashboard\Permission\Store;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Responses\Dashboard\Permission\Store\StoreBuilder as Contract;
use App\Http\Responses\Dashboard\Permission\Store\StoreBuilder as Service;
class StoreBuilderServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Service::class);
    }
    public function provides():array
    {
        return [
            Contract::class
        ];
    }
}
