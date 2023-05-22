<?php

namespace App\Providers\Services\ResponseVisitors\Rule;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\ResponseVisitors\Rule\ExplodeArrayExistsInTable as Contract;
use App\Services\ResponseVisitors\Rule\ExplodeArrayExistsInTable as Visitor;
class ExplodeArrayExistsInTableServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Visitor::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
