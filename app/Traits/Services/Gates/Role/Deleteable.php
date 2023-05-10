<?php

namespace App\Traits\Services\Gates\Role;

trait Deleteable
{
    public function delete(): bool
    {
        return false;
    }
}
