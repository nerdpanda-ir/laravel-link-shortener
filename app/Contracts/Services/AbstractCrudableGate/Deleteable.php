<?php

namespace App\Contracts\Services\AbstractCrudableGate;

interface Deleteable
{
    public function delete():bool;
}
