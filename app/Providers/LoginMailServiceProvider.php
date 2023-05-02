<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\LoginMailContract as Contract;
use App\Mail\LoginMail as Entity;
class LoginMailServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(Contract::class,Entity::class);
    }
    public function provides():array
    {
        return [
            Contract::class,Entity::class
        ];
    }
}
