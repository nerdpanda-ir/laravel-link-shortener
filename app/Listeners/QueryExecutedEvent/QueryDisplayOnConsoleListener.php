<?php

namespace App\Listeners\QueryExecutedEvent;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Events\QueryExecuted;

class QueryDisplayOnConsoleListener
{
    protected Application $container;
    public function __construct(Application $container)
    {
        $this->container = $container;
    }

    public function handle(QueryExecuted $event): void
    {
        if (!config('queryExecuted.console_display') || !$this->container->runningInConsole())
            return;
        dump($event);
    }
}
