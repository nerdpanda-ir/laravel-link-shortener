<?php

namespace App\Services\Gates;
use App\Contracts\Services\Gates\Role as Contract;
use App\Services\AbstractCrudableGate;

class Role extends AbstractCrudableGate implements Contract
{
    public function viewAll(): bool
    {
        dd(__METHOD__);
    }
    public function create(): bool
    {
        dd(__METHOD__);
    }

    public function delete(): bool
    {
        dd(__METHOD__);
    }

    public function edit(): bool
    {
        dd(__METHOD__);
    }
}
