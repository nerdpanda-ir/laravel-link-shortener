<?php

namespace App\Providers\Request\Dashboard\Role;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Requests\Dashboard\Role\Save as Contract;
use App\Http\Requests\Dashboard\Role\Save as Request;
class SaveServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Request::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
