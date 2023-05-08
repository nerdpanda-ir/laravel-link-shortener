<?php

namespace App\Providers\Responses\Dashboard\Permission\Update;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Responses\Dashboard\Permission\Update\ExceptionThrow as Contract;
use App\Http\Responses\Dashboard\Permission\Update\ExceptionThrow as ResponseBuilder;
class ExceptionThrowServiceProvider extends ServiceProvider
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
