<?php

namespace App\Providers\Responses\Dashboard\Permission\Delete;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Responses\Dashboard\Permission\Delete\Ok as Contract;
use App\Http\Responses\Dashboard\Permission\Delete\Ok as ResponseBuilder;
class OkServiceProvider extends ServiceProvider implements DeferrableProvider
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
