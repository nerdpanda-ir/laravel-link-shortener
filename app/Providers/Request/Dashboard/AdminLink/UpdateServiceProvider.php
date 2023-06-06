<?php

namespace App\Providers\Request\Dashboard\AdminLink;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Requests\Dashboard\AdminLink\Update as Contract;
use App\Http\Requests\Dashboard\AdminLink\Update as Request;
class UpdateServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Request::class );
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
