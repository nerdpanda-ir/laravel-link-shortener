<?php

namespace App\Providers\Responses\Dashboard\Role\Save\Rule;

use App\Contracts\Responses\Rules\Dashboard\role\save\ExplodeArrayExistsInTableBridge as Contract;
use App\Http\Responses\Rule\Dashboard\Role\ExplodeArrayExistsInTableBridge as ResponseBuilder;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ExplodeArrayIsExistsInTableServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , ResponseBuilder::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
