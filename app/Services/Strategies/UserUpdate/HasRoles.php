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
        $roles = \RoleModel::whereIn('name',$this->request->get('roles'))
                            ->get(['id']);
        $roles = $roles->pluck('id');
        $roles = $roles->map(
            fn(int $id)=> [
                'role_id'=> $id ,
                'created_by'=> \AuthenticatedUser::getUser()->id ,
                'created_at' => \DateServiceFacade::date() ,
            ]
        );
        $this->getUser()->roles()->sync($roles);
        DB::commit();
        return $updated;
    }
}
