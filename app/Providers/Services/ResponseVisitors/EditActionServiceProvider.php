<?php

namespace App\Providers\Services\ResponseVisitors;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\ResponseVisitors\EditAction as Contract;
use App\Services\ResponseVisitors\EditAction as Visitor;
class EditActionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Visitor::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
