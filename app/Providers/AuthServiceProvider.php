<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Services\Gates\SystemMonitor;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];
    protected $gates = [
        'see-ram-usage' => [SystemMonitor::class,'ramUsage'] ,
        'see-disk-usage' => [SystemMonitor::class,'diskUsage'] ,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(Gate $gateManager): void
    {
        foreach ($this->gates as $gateName=>$gateAction)
            $gateManager->define($gateName,$gateAction);
    }
}
