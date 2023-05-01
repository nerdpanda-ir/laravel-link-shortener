<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\DoLoginRequestContract as Contract;
use App\Http\Requests\DoLoginRequest as Request;
class DoLoginRequestServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Request::class);
    }
    public function provides():array
    {
        return [Contract::class,Request::class];
    }
}
