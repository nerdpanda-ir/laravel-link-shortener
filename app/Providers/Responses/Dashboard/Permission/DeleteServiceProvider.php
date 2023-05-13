<?php

namespace App\Providers\Responses\Dashboard\Permission;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Responses\Dashboard\Permission\Delete as Contract;
use App\Http\Responses\Dashboard\Permission\Delete as Response;
class DeleteServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Response::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
