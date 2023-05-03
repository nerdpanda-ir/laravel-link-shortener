<?php

namespace App\Listeners\Job;

use Illuminate\Queue\Events\JobProcessed;
use Psr\Log\LoggerInterface as Logger;
use Illuminate\Contracts\Translation\Translator ;
class LogProcessedListener
{
    protected Logger $logger;
    protected Translator $translator;

    /**
     * Create the event listener.
     */
    public function __construct(Logger $logger , Translator $translator)
    {
        $this->logger = $logger ;
        $this->translator = $translator;
    }

    /**
     * Handle the event.
     */
    public function handle(JobProcessed $event): void
    {
        $jobName = $event->job->resolveName();
        $this->logger->info(
            $this->translator->get('messages.log.jobs.processed', ['name' => $jobName ])
        );
    }
}
