<?php

trait DisableTimestamp
{
    public function usesTimestamps():bool {
        return false;
    }
}
