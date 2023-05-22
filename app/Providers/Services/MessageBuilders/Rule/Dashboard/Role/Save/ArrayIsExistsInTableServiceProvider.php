<?php

namespace App\Providers\Services\MessageBuilders\Rule\Dashboard\Role\Save;

use App\Contracts\Services\MessageBuilders\Rule\Dashboard\Role\ArrayIsExistsInTable as Contract;
use App\Services\MessageBuilders\Rule\Dashboard\Role\ArrayIsExistsInTable as MessageBuilder;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ArrayIsExistsInTableServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , MessageBuilder::class );
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
