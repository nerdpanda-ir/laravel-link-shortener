<?php

namespace App\Traits;
use Psr\Log\LoggerInterface as Logger;
trait LoggerGetterable
{
    public function getLogger():Logger {
        return $this->logger;
    }
}
