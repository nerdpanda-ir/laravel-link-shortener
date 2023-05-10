<?php

namespace App\Contracts\Services\AbstractCrudableGate;

interface Editable
{
    public function edit():bool;
}
