<?php

namespace App\Services;
use App\Contracts\Services\Strategies\UserUpdate\CantAttachRoleToUser;
use App\Contracts\Services\Strategies\UserUpdate\HasNoRoles;
use App\Contracts\Services\Strategies\UserUpdate\HasRoles;
use App\Contracts\Services\UserUpdateStrategy;
use App\Contracts\Services\UserUpdateStrategyFactory as Contract;
use App\Models\User;

class UserUpdateStrategyFactory implements Contract
{
    public function make(): UserUpdateStrategy
    {
        /** @var User $user */
        $user = \AuthenticatedUser::getUser();
        if($user->cant('attach-role-to-user'))
            return app(CantAttachRoleToUser::class);
        elseif (!request()->has('roles'))
            return app(HasNoRoles::class);
        else
            return app(HasRoles::class);
    }
}
