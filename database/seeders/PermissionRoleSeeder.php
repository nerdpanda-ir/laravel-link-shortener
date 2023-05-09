<?php

namespace Database\Seeders;
use App\Contracts\Model\Permission as Permission;
use App\Contracts\PermissionRoleSeederContract as Contract;
use App\Contracts\RoleModelContract as Role;
use App\Contracts\UserableContract as User;
use Faker\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use NerdPanda\Exceptions\NoDependencyFoundForSeedingException;

class PermissionRoleSeeder extends Seeder implements Contract
{
    /**
     * Run the database seeds
     */
    public function run(
        Role $role , Permission $permission , User $user , Factory $faker ,
    ): void
    {
        /** @var Collection $roles */
        $roles = $role->get(['id']);
        if ($roles->isEmpty())
            throw new NoDependencyFoundForSeedingException(
                trans('exceptions.no-dependency-found', ['dependency' => 'roles' , 'seeder' => self::class ])
            );
        /** @var Collection $permissions */
        $permissions = $permission->get(['id']);
        if ($permissions->isEmpty())
            throw new NoDependencyFoundForSeedingException(
                trans('exceptions.no-dependency-found', ['dependency' => 'permissions' , 'seeder' => self::class ])
            );
        $users = $user->whereVerifiedEmail()->offset(0)->limit(3)->get(['id']);
        if ($users->isEmpty())
            throw new NoDependencyFoundForSeedingException(
                trans('exceptions.no-dependency-found', ['dependency' => 'users' , 'seeder' => self::class ])
            );
        DB::table('permission_role')->truncate();
        $faker = $faker::create();
        foreach ($roles as $role){
            $rolePermissions = [];
            foreach ($permissions as $permissionItem){
                if (rand(0,1)){
                    $updated_at = null ;
                    $created_at = $faker->dateTimeBetween(
                        now()->subMonths(4) , now()->subDays(3)
                    );
                    if (rand(0,1))
                        $updated_at = $faker->dateTimeBetween(
                            now()->setTimestamp($created_at->getTimestamp())->addMinutes(rand(2,60)) ,
                        );
                    $rolePermissions[] = [
                        'created_at' => $created_at , 'updated_at' => $updated_at ,
                        'permission_id' => $permissionItem->id , 'created_by' => $users->random()->id
                    ];
                }

            }
            $role->permissions()->sync($rolePermissions);
        }
    }
}
