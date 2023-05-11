<?php

namespace App\Services;
use App\Contracts\Model\Userable as User;
use App\Contracts\Services\PermissionsFlyWeight as Contract;
use Illuminate\Database\Eloquent\Collection;

class PermissionsFlyWeightService implements Contract
{
    protected array $permissions;
    /**
     * @var \App\Models\User $user
     */
    protected User $user;

    public function getPermissions(): array
    {
        $isLoadedPermissions = $this->user->relationLoaded('permissions');
        if (!$isLoadedPermissions){
            if (!isset($this->permissions))
                return $this->permissions = [];
            else
                return $this->permissions;
        }
        /** @var Collection $permissions */
        $permissions = $this->user->permissions;
        if ($permissions->isEmpty()){
            if (isset($this->permissions))
                return $this->permissions;
            else
                return $this->permissions = [];
        }
        if (isset($this->permissions) and !empty($this->permissions))
            return $this->permissions;
        /** @var CollectionToArrayService $toArrayStrategy */
        $toArrayStrategy = app('permissionsToArray');
        return $this->permissions = $toArrayStrategy->toArray($permissions);
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
