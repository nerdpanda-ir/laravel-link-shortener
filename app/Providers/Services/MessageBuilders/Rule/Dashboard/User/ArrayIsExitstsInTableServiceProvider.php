<?php

namespace App\Providers\Services\MessageBuilders\Rule\Dashboard\User;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Services\MessageBuilders\Rule\Dashboard\User\ArrayIsExistsInTable as Contract;
use App\Services\MessageBuilders\Rule\Dashboard\User\ArrayIsExistsInTable as MessageBuilder;
class ArrayIsExitstsInTableServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,MessageBuilder::class);
    }
    public function provides()
    {
        return [Contract::class];
    }
}
