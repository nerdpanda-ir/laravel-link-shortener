<?php

namespace App\Providers\Mails;

use App\Contracts\Mails\Login as Contract;
use App\Mail\LoginMail as Entity;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class LoginServiceProvider extends ServiceProvider implements DeferrableProvider
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
