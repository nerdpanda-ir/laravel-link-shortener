<?php

namespace App\Contracts\Services;
use App\Contracts\DatabaseManagerGetterable;
use Illuminate\Contracts\Database\Query\Builder;

interface UniqueExceptExistableBridge extends DatabaseManagerGetterable
{
    public function build():bool;
}
