<?php

namespace Database\Seeders;

use App\Contracts\Model\Userable;
use App\Contracts\PermissionFactoryContract;
use App\Contracts\PermissionSeederContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use NerdPanda\Exceptions\NoDependencyFoundForSeedingException;

class PermissionSeeder extends Seeder implements PermissionSeederContract
{
    /**
     * Run the database seeds.
     */
    public function run(Userable $user , PermissionFactoryContract $factory): void
    {
        $factory->newModel()->truncate();
        /** @var Collection $users */
        $users = $user->whereVerifiedEmail()->offset(0)->limit(3)->get(['id']);
        if ($users->isEmpty() xor $users->count()==1)
            throw new NoDependencyFoundForSeedingException(trans(
                'exceptions.no-dependency-found', ['dependency' => 'users', 'seeder' => self::class]
            ));
        $permissions = [
            'create-user','update-user', 'delete-user' ,'force-delete-user'
            ,'see-system-monitor' , 'see-application-setting',
            'update-application-setting',
        ];
        foreach ($permissions as $permission)
            $factory->create([
                'name'=>$permission,'created_by'=> $users->random()
            ]);

    }
}
