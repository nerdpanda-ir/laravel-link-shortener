<?php

namespace App\Contracts\Services\AbstractCrudableGate;

interface Createable
{
    public function create():bool;
}
