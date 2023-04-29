<?php

namespace Database\Seeders;

use App\Contracts\RoleFactoryContract;
use App\Contracts\RoleSeederContract;
use App\Contracts\UserableContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use NerdPanda\Exceptions\NoDependencyFoundForSeedingException;

class RoleSeeder extends Seeder implements RoleSeederContract
{
    /**
     * Run the database seeds.
     */
    public function run(RoleFactoryContract $factory , UserableContract $user): void
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
