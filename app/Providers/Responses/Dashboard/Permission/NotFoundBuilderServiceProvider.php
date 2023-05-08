<?php

namespace App\Providers\Responses\Dashboard\Permission;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Responses\Dashboard\Permission\NotFound as Contract;
use App\Http\Responses\Dashboard\Permission\NotFound as ResponseBuilder;
class NotFoundBuilderServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,ResponseBuilder::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
