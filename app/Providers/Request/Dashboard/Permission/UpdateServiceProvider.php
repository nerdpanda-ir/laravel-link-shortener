<?php

namespace App\Providers\Request\Dashboard\Permission;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Requests\Dashboard\Permission\Update as Contract;
use App\Http\Requests\Dashboard\Permission\Update as Request;
class UpdateServiceProvider extends ServiceProvider implements DeferrableProvider
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
