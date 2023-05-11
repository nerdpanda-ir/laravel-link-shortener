<?php

namespace App\Services;

use App\Contracts\Services\PermissionsToArray;
use Illuminate\Support\Collection;

class PermissionsToArrayJustNameStrategyService extends CollectionToArrayService implements PermissionsToArray
{
    public function toArray(Collection $collection):array
    {
        return $collection->map->name->toArray();
    }
}
