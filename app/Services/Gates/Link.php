<?php

namespace App\Services\Gates;

use App\Services\AbstractCrudableGate;
use App\Contracts\Services\Gates\Link as Contract;

class Link extends AbstractCrudableGate implements Contract
{
    public function viewAll(): bool
    {
        return $this->getPermissionManager()->has('link-view-all');
    }
    public function create(): bool
    {
        throw new Exception('no has create action !!! ');
    }

    public function delete(): bool
    {

    }

    public function edit(): bool
    {
        // TODO: Implement edit() method.
    }

}
