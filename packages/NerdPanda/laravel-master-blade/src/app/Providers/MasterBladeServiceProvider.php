<?php

namespace NerdPanda\Providers;

use Illuminate\Support\ServiceProvider;

class MasterBladeServiceProvider extends ServiceProvider
{
    protected string $base_path;
    public function __construct($app)
    {
        parent::__construct($app);
        $this->base_path = dirname(__DIR__,2);
    }

    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->loadViewsFrom(
            $this->base_path.'/resources/views/','MasterBlade'
        );
        $this->publishes([
            $this->base_path.'/resources/views/' => resource_path('views')
        ],'masterBlade.views');
    }
}
