<?php

namespace Database\Seeders;

use App\Contracts\Model\Userable as User;
use App\Contracts\PermissionUserSeederContract as Contract;
use Illuminate\Database\Seeder;

class PermissionUserSeeder extends Seeder implements Contract
{
    /**
     * Run the database seeds.
     */
    public function run(User $user): void
    {
        \DB::table('permission_user')->truncate();
        $users = $user->with([
            'roles:roles.id,role_user.created_at as role_user_created_at,role_user.updated_at as role_user_updated_at,role_user.created_by as role_user_created_by',
            'roles.permissions:permissions.id'
        ])->get(['id','name']);
        foreach ($users as $userItem){
            $userPermissions  = collect([]);
            foreach ($userItem->roles as $role)
                foreach ($role->permissions as $permission)
                    $userPermissions->push([
                        'user_id' => $userItem->id , 'permission_id' => $permission->id ,
                        'created_at' => $role->role_user_created_at , 'updated_at' => $role->role_user_updated_at ,
                        'created_by' => $role->role_user_created_by ,
                    ]);
            $userItem->permissions()->sync($userPermissions->unique->permission_id->toArray());
        }
    }
}
