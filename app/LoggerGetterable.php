<?php

namespace App;
use Psr\Log\LoggerInterface as Logger;
interface LoggerGetterable
{
    public function getLogger():Logger;
}
