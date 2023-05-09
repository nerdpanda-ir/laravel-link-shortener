<?php

namespace App\Providers\Exceptions;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Exceptions\FailDelete as Contract;
use App\Exceptions\FailDelete as Exception ;
class FailDeleteServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Exception::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
