<?php

namespace App\Listeners;

use App\Services\JobLoggerListener;
use Illuminate\Queue\Events\JobFailed;

class LogFailedListener extends JobLoggerListener
{
    public function handle(JobFailed $event): void
    {
        $jobName = $event->job->resolveName();
        $this->logger->info(
            $this->translator->get('messages.log.jobs.failed', ['name' => $jobName])
        );
    }
}
