<?php

namespace Database\Seeders;

use App\Contracts\Factories\Role;
use App\Contracts\Model\Userable;
use App\Contracts\Seeder\Role as Contract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use NerdPanda\Exceptions\NoDependencyFoundForSeedingException;

class RoleSeeder extends Seeder implements Contract
{
    /**
     * Run the database seeds.
     */
    public function run(Role $factory , Userable $user): void
    {
        $factory->newModel()->truncate();
        /** @var Collection $users*/
        $users = $user->whereVerifiedEmail()->offset(0)->limit(3)->get(['id']);
        if ($users->isEmpty() xor $users->count()==1)
            throw new NoDependencyFoundForSeedingException(trans(
                'exceptions.no-dependency-found', ['dependency' => 'users', 'seeder' => self::class]
            ));
        $roles = ['root','admin','manager','author','user'];
        foreach ($roles as $role)
            $factory->create(['created_by'=> $users->random(), 'name'=>$role]);
    }
}
