<?php

namespace Database\Seeders;

use App\Contracts\RoleFactoryContract;
use App\Contracts\RoleSeederContract;
use App\Contracts\UserableContract;
use App\Exceptions\NoUserFoundForSeedingException;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

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
        if ($users->isEmpty())
            throw new NoUserFoundForSeedingException(self::class);
        $roles = ['root','admin','manager','author','user'];
        foreach ($roles as $role)
            $factory->create(['created_by'=> $users->random(), 'name'=>$role]);
    }
}
