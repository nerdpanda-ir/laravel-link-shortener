<?php

namespace App\Services;
use App\Contracts\Services\AuthenticatedUser as Contract;
use App\Traits\Userable;
use App\Contracts\Model\Userable as Model;
use App\Traits\UserSeeterable;

class AuthenticatedUser implements Contract
{
    use UserSeeterable;
    protected ?Model $user = null ;
    public function getUser(): Model|null
    {
        return $this->user;
    }
}
