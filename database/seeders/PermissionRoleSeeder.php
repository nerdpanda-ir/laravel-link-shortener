<?php

namespace Database\Seeders;
use App\Contracts\Model\Permission as Permission;
use App\Contracts\Model\Role as Role;
use App\Contracts\Model\Userable as User;
use App\Contracts\Seeder\PermissionRole as Contract;
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
        /** @var \App\Models\Role $root_role */
        $root_role = $role->where('name','=','root')->first(['id']);
        if (is_null($root_role))
            throw new NoDependencyFoundForSeedingException(
                trans('exceptions.no-dependency-found', ['dependency' => 'roles' , 'seeder' => self::class ])
            );
        /** @var Collection $permissions */
        $permissions = $permission->get(['id']);
        if ($permissions->isEmpty())
            throw new NoDependencyFoundForSeedingException(
                trans('exceptions.no-dependency-found', ['dependency' => 'permissions' , 'seeder' => self::class ])
            );
        $root_user = $user->where('user_id','=','nerdpanda')->first(['id']);
        if (is_null($root_user))
            throw new NoDependencyFoundForSeedingException(
                trans('exceptions.no-dependency-found', ['dependency' => 'users' , 'seeder' => self::class ])
            );
        DB::table('permission_role')->truncate();
        $faker = $faker::create();
        foreach ($permissions as $permissionItem) {
            $updated_at = null;
            $created_at = $faker->dateTimeBetween(
                now()->subMonths(4), now()->subDays(3)
            );
            if (rand(0, 1))
                $updated_at = $faker->dateTimeBetween(
                    now()->setTimestamp($created_at->getTimestamp())->addMinutes(rand(2, 60)),
                );
            $root_role->permissions()->attach($permissionItem->id,[
                'created_at' => $created_at , 'updated_at' => $updated_at , 'created_by' => $root_user->id
            ]);
        }
    }
}
