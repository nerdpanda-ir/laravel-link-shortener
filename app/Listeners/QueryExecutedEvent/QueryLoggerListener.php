<?php

namespace App\Listeners\QueryExecutedEvent;

use App\Contracts\LoggerGetterable;
use App\Traits\LoggerGetterable as LoggerGetterableTrait;
use Illuminate\Database\Events\QueryExecuted;
use Psr\Log\LoggerInterface as Logger;

class QueryLoggerListener implements LoggerGetterable
{
    use LoggerGetterableTrait;
    protected Logger $logger;
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function handle(QueryExecuted $event): void
    {
        $this->logger->debug('query Executed !!!' ,[$event]);
        if (!config('queryExecuted.log'))
            return;
        $payload = [];
        foreach ($event as $key=>$value)
            if ($key!='sql')
                $payload[$key] = $value;
        $this->logger->debug('QUERY EXECUTED -> '.$event->sql , $payload);
    }
}
