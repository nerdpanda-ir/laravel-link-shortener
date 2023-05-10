<?php

namespace App\Services\Gates;
use App\Contracts\Services\Gates\Role as Contract;
use App\Services\AbstractCrudableGate;
use App\Traits\Services\Gates\Role as RoleTrait;
class Role extends AbstractCrudableGate implements Contract
{
    use RoleTrait;


    public function delete(): bool
    {
        dd(__METHOD__);
    }

    public function edit(): bool
    {
        dd(__METHOD__);
    }
}
