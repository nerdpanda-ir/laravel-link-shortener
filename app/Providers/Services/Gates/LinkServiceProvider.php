<?php

namespace App\Providers\Services\Gates;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\Gates\Link as Contract;
use App\Services\Gates\Link as Gate;
class LinkServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Contract::class,Gate::class);
    }

    public function provides():array
    {
        return [Contract::class];
    }
}
