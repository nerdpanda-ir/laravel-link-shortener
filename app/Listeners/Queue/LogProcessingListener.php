<?php

namespace App\Listeners\Queue;

use Illuminate\Queue\Events\JobProcessing;
use Psr\Log\LoggerInterface as Logger;
use Illuminate\Contracts\Translation\Translator;

class LogProcessingListener
{
    protected Logger $logger;
    protected Translator $translator;
    public function __construct(Logger $logger,Translator $translator)
    {
        $this->logger = $logger;
        $this->translator = $translator ;
    }

    public function handle(JobProcessing $event): void
    {
        $jobName = $event->job->resolveName();
        $this->logger->info(
            $this->translator->get('messages.log.jobs.processing', ['name' => $jobName ])
        );
    }
}
