<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface CollectionToArrayContract
{
    public function toArray(Collection $collection);
}
