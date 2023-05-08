<?php

namespace App\Providers\Rule;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Rule\UniqueExcept as Contract;
use App\Rules\UniqueExcept as Rule;
class UniqueExceptServiceProvider extends ServiceProvider implements DeferrableProvider
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
