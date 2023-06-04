<?php

namespace App\Providers\Redirectors;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Redirectors\Link as Contract;
use App\Http\Redirector\Link as Redirector;
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
