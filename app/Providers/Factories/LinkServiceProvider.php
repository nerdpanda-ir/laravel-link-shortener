<?php

namespace App\Providers\Factories;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Factories\Link as Contract;
use Database\Factories\LinkFactory as Factory;
class LinkServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Factory::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
