<?php

namespace App\Services;

use App\Contracts\PermissionsToArrayContract;
use Illuminate\Support\Collection;

class PermissionsToArrayJustNameStrategyService extends CollectionToArrayService implements PermissionsToArrayContract
{
    public function toArray(Collection $collection):array
    {
        return $collection->map->name->toArray();
    }
}
