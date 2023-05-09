<?php

namespace App\Contracts\Services;

use Illuminate\Support\Collection;

interface CollectionToArrayContract
{
    public function toArray(Collection $collection):array;
}
