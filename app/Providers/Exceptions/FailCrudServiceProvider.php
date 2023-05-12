<?php

namespace App\Providers\Exceptions;

use App\Contracts\Exceptions\FailCrud as Contract;
use App\Exceptions\FailCrud as Exception;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class FailCrudServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Exception::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
