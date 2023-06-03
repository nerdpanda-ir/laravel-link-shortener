<?php

namespace App\Providers\Seeder;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Seeder\Link as Contract;
use Database\Seeders\LinkSeeder as Seeder;
class LinkServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Seeder::class);
        $this->app->alias(Contract::class , 'contract.seeder.link');
    }
    public function provides():array
    {
        return [Contract::class,'contract.seeder.link'];
    }
}
