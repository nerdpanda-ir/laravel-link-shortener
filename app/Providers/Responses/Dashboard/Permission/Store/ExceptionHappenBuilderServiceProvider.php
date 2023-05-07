<?php

namespace App\Providers\Responses\Dashboard\Permission\Store;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Responses\Dashboard\Permission\Store\ExceptionHappenBuilder as Contract;
use App\Http\Responses\Dashboard\Permission\Store\ExceptionHappenBuilder as Builder;
class ExceptionHappenBuilderServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class,Builder::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
