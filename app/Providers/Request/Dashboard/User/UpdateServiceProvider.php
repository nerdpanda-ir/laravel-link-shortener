<?php

namespace App\Providers\Request\Dashboard\User;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Requests\Dashboard\User\Update as Contract;
use App\Http\Requests\Dashboard\User\Update as Request;
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
