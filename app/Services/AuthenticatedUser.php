<?php

namespace App\Services;
use App\Contracts\Services\AuthenticatedUser as Contract;
use App\Traits\Userable;
use App\Contracts\Model\Userable as Model;
class AuthenticatedUser implements Contract
{
    use Userable;
    protected Model $user;
}
