<?php
namespace NerdPanda\Traits\Model;
trait DisableTimestamp
{
    public function usesTimestamps():bool {
        return false;
    }
}
