<?php

namespace App\Providers\Rule;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Rule\ArrayIsExistsInTable as Contract;
use App\Rules\ArrayIsExistsInTable as Rule;
class ArrayIsExistsInTableServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Rule::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
