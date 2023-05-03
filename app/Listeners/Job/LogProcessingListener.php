<?php

namespace App\Listeners\Job;

use Illuminate\Queue\Events\JobProcessing;
use App\Services\JobLoggerListener;


class LogProcessingListener extends JobLoggerListener
{
    public function handle(JobProcessing $event): void
    {
        $jobName = $event->job->resolveName();
        $this->getLogger()->info(
            $this->getTranslator()->get('messages.log.jobs.processing', ['name' => $jobName ])
        );
    }
}
