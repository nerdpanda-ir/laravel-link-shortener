<?php

namespace App\Listeners\QueryExecutedEvent;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Events\QueryExecuted;

class QueryDisplayOnWebListener
{
    protected Application $container;
    public function __construct(Application $container)
    {
        $this->container = $container;
    }

    public function handle(QueryExecuted $event): void
    {
        if (!config('queryExecuted.web_display') || $this->container->runningInConsole())
            return;
        echo "<section class='alert text-warning bg-dark'>{$event->sql}</section>";
        $payLoad = get_object_vars($event);
        unset($payLoad['sql'],$payLoad['connection']);
        $payLoadStr = "<ul class='alert text-warning bg-dark'>";
        foreach ($payLoad as $key=> $value){
            if ($key=="bindings")
                $payLoadStr.="<li> <b>$key</b> : [ ".implode(',',$payLoad['bindings']).' ] </li>';
            else
                $payLoadStr.="<li> <b>$key</b> : $value </li>";
        }
        echo $payLoadStr;
    }
}
