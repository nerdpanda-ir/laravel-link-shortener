<?php

namespace App\Services\Strategies\UserUpdate;
use App\Contracts\Services\Strategies\UserUpdate\HasRoles as Contract;
use App\Services\UserUpdateStrategy;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class HasRoles extends UserUpdateStrategy implements Contract
{
    public function updateCommand(): bool
    {
        DB::beginTransaction();
        $updated = $this->updateUser();
        /** @var Collection $roles */
        $roles = \RoleModel::whereIn('name',request()->get('roles'))
                            ->get(['id']);
        $roles = $roles->pluck('id');
        $this->getUser()->roles()->syncWithPivotValues(
                $roles,
                ['created_by'=> \AuthenticatedUser::getUser()->id , 'created_at' => \DateServiceFacade::date()]
        );
        DB::commit();
        return $updated;
    }
}
