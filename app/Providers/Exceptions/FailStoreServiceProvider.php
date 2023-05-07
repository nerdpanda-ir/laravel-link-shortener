<?php

namespace App\Providers\Exceptions;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Exceptions\FailStore as Contract;
use App\Exceptions\FailStoreException as Exception;
class FailStoreServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Exception::class);
    }
    public function provides():array
    {
        return [
            Contract::class
        ];
    }
}
