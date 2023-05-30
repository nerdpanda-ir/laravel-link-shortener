<?php

namespace App\Services;
use App\Contracts\Services\UserUpdateStrategy as Contract;
use App\Exceptions\FailCrud;
use App\Traits\RequestGetterable;
use App\Traits\Userable;
use App\Contracts\Model\Userable as UserModel;
use Illuminate\Http\Request;

abstract class UserUpdateStrategy implements Contract
{
    use Userable , RequestGetterable ;
    protected UserModel $user;
    protected function updateUser():bool {
        $updated = $this->getUser()->update();
        if (!$updated)
            throw new FailCrud();
        return $updated;
    }
}
