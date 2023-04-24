<?php

namespace NerdPanda\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ComponentAttributeBagFactoryProxyProvider extends ServiceProvider implements DeferrableProvider
{
    protected array $serviceConfig;
    protected string $base_path;
    public function __construct($app)
    {
        parent::__construct($app);
        $this->base_path = dirname(__DIR__,2);
        $this->mergeConfigFrom(
            $this->base_path.'/config/componentAttributeBagFactoryProxy.php','componentAttributeBagFactoryProxy'
        );
        $this->serviceConfig = config('componentAttributeBagFactoryProxy');
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        if ($this->serviceConfig['implementer']['singleton'])
            $this->app->singleton($this->serviceConfig['implementer']['class']);
        $this->app->bind(
            $this->serviceConfig['contract'] ,
            function (){
                if (!$this->serviceConfig['singleton'] && $this->serviceConfig['implementer']['singleton'])
                    return new $this->serviceConfig['implementer']['class'];
                return $this->app->make($this->serviceConfig['implementer']['class']);
            } ,
            $this->serviceConfig['singleton']
        );
        $this->app->alias($this->serviceConfig['implementer']['class'],$this->serviceConfig['alias']);
    }
    public function boot():void{
        $this->publishes([
            $this->base_path.'/config' => config_path()
        ],'ComponentAttributeBagFactoryProxy.configs');
    }
    public function provides():array
    {
        $result = [
            $this->serviceConfig['alias'] , $this->serviceConfig['contract']
        ];
        if ($this->serviceConfig['implementer']['singleton'])
            $result[] = $this->serviceConfig['implementer']['class'];
        return $result;
    }
}
