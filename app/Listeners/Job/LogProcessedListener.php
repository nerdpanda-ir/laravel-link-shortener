<?php

namespace App\Listeners\Job;

use Illuminate\Queue\Events\JobProcessed;
use App\Services\JobLoggerListener;

class LogProcessedListener extends JobLoggerListener
{
    /**
     * Handle the event.
     */
    public function handle(JobProcessed $event): void
    {
        $jobName = $event->job->resolveName();
        $this->getLogger()->info(
            $this->getTranslator()->get('messages.log.jobs.processed', ['name' => $jobName ])
        );
    }
}
