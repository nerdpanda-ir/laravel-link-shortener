<?php

namespace App\Listeners\Queue;

use Illuminate\Queue\Events\JobProcessing;

class LogProcessingListener
{
    public function __construct()
    {
    }

    public function handle(JobProcessing $event): void
    {

    }
}
