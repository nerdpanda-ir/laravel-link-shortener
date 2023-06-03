<?php

namespace App\Providers\Model;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Model\Link as Contract;
use App\Models\Link as Model;
class LinkServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Model::class);
        $this->app->alias(Contract::class , 'contract.model.link');
    }

    public function provides():array
    {
        return [Contract::class,'contract.model.link'];
    }
}
