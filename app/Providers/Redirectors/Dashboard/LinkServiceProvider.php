<?php

namespace App\Providers\Redirectors\Dashboard;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Redirectors\Dashboard\Link as Contract;
use App\Http\Redirector\Dashboard\Link as Redirector;
class LinkServiceProvider extends ServiceProvider implements DeferrableProvider
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
