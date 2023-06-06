<?php

namespace Database\Seeders;

use App\Contracts\Factories\Permission as PermissionFactory;
use App\Contracts\Model\Userable;
use App\Contracts\Seeder\Permission as Contract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use NerdPanda\Exceptions\NoDependencyFoundForSeedingException;

class PermissionSeeder extends Seeder implements Contract
{
    /**
     * Run the database seeds.
     */
    public function run(Userable $user , PermissionFactory $factory): void
    {
        $factory->newModel()->truncate();
        /** @var Collection $users */
        $users = $user->whereVerifiedEmail()->offset(0)->limit(3)->get(['id']);
        if ($users->isEmpty() xor $users->count()==1)
            throw new NoDependencyFoundForSeedingException(trans(
                'exceptions.no-dependency-found', ['dependency' => 'users', 'seeder' => self::class]
            ));
          $permissions = [
              'permission-view-all' , 'permission-create' , 'permission-edit' , 'permission-delete' , 'role-view-all' ,
              'role-edit' , 'role-delete' , 'role-create' , 'user-view-all' , 'user-create' , 'user-edit' , 'user-delete' ,
              'set-password-for-user' , 'attach-role-to-user' , 'verify-user-email' , 'link-view-all'
          ];

        foreach ($permissions as $permission)
            $factory->create([
                'name'=>$permission,'created_by'=> $users->random()
            ]);

    }
}
