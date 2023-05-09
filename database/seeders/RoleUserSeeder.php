<?php

namespace Database\Seeders;

use App\Contracts\Model\Role as Role;
use App\Contracts\Model\Userable;
use App\Contracts\Seeder\RoleUser as Contract;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder implements Contract
{
    /**
     * Run the database seeds.
     * @param User $user
     * @param \App\Models\Role $user
     */
    public function run(Userable $user, Role $role , Generator $faker): void
    {
        DB::table('role_user')->truncate();
        $root = $user->whereVerifiedEmail()->first(['id','created_at']);
        $rootRole = $role->orderBy('id')->first(['id']);
        $root->roles()->sync([
            ['role_id' => $rootRole->id , 'created_at' => $root->created_at , 'created_by'=> $root->id ]
        ]);

        /** @var Collection $admins*/
        $admins = $user->whereVerifiedEmail()->offset(1)->limit(2)->get(['id']);
        $adminRole = $role->orderBy('id')->offset(1)->first(['id']);
        $admins->each(function (Userable $admin)use ($adminRole,$faker,$root){
            $created_at = $faker->dateTimeBetween(
                now()->subDays(25) , now()->subDays(7)
            );
            $updated_at = null;
            if (rand(0,1))
                $updated_at = $faker->dateTimeBetween(
                    now()->setTimestamp($created_at->getTimestamp())->addSeconds(rand(30,6000))
                );
            $admin->roles()->sync([
                [
                    'created_at'=>$created_at , 'updated_at' => $updated_at ,
                    'created_by' => $root->id , 'role_id'=>$adminRole->id
                ]
            ]);
        });

        /** @var \App\Models\Role $role*/
        $otherRoles = $role->whereNotIn('id',[$adminRole->id,$rootRole->id])->get(['id']);
        $otherUsers =  $user->whereNotIn(
            'id', array_merge($admins->map->id->toArray(),[$root->id])
        )->get(['id']);
        /** @var User $otherUser*/
        foreach ($otherRoles as $otherRole){
            foreach ($otherUsers as $otherUser){
                if (rand(0,1)){
                    $created_at = $faker->dateTimeBetween(now()->subDays(500),now()->subHours(5));
                    $data = ['created_at' => $created_at , 'updated_at' => null];
                    $otherUser->roles()->attach($otherRole->id,$data);
                }
            }
        }

    }
}
