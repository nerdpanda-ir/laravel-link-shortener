<?php

namespace App\Providers\Services\Commands;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\Commands\CreateLink as Contract;
use App\Services\Commands\CreateLink as Command;
class CreateLinkServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Command::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
