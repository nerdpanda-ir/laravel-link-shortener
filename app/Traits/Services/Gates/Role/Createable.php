<?php

namespace App\Traits\Services\Gates\Role;

trait Createable
{
    public function create(): bool
    {
        return false;
    }
}
