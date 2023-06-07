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
        $root = $user->whereVerifiedEmail()->where('user_id','=','nerdpanda')->first(['id','created_at']);
        $rootRole = $role->orderBy('id')->first(['id']);
        $root->roles()->sync([
            ['role_id' => $rootRole->id , 'created_at' => $root->created_at , 'created_by'=> $root->id ]
        ]);
    }
}
