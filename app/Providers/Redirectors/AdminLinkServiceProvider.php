<?php

namespace App\Providers\Redirectors;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Redirectors\Dashboard\AdminLink as Contract;
use App\Http\Redirector\Dashboard\AdminLink as Redirector;
class AdminLinkServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Redirector::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
