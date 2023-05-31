<?php

namespace App\Providers\Request;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Requests\DoRegister as Contract;
use App\Http\Requests\DoRegister as Request;
class DoRegisterServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Request::class);
    }

    public function provides():array
    {
        return [Contract::class];
    }
}
