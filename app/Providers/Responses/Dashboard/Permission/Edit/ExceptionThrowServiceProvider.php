<?php

namespace App\Providers\Responses\Dashboard\Permission\Edit;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Responses\Dashboard\Permission\Edit\ExceptionThrow as Contract;
use App\Http\Responses\Dashboard\Permission\Edit\ExceptionThrow as ResponseBuilder;
class ExceptionThrowServiceProvider extends ServiceProvider implements DeferrableProvider
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
