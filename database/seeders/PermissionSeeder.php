<?php

namespace Database\Seeders;

use App\Contracts\PermissionFactoryContract;
use App\Contracts\UserableContract;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(UserableContract $user , PermissionFactoryContract $factory): void
    {
        $factory->newModel()->truncate();
        /** @var Collection $users */
        $users = $user->isVerifiedEmail()->get(['id']);
        if (empty($users))
            throw new \Exception("no found any user for permission seeding ");
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
