<?php

namespace App\Services\Gates;
use App\Contracts\Services\Gates\User as Contract;
use App\Services\AbstractCrudableGate;
use App\Traits\Services\Gates\User as UserTrait;
class User extends AbstractCrudableGate implements Contract
{
    use UserTrait;
}
