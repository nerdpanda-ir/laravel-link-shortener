<?php

namespace Database\Seeders;

use App\Contracts\Factories\Role;
use App\Contracts\Model\Userable;
use App\Contracts\Seeder\Role as Contract;
use App\Facades\Models\User;
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
        /** @var User $root_user*/
        $root_user = $user->where('id','=','1')->first(['id']);
        if (is_null($root_user))
            throw new NoDependencyFoundForSeedingException(trans(
                'exceptions.no-dependency-found', ['dependency' => 'root user', 'seeder' => self::class]
            ));
        $factory->create(['created_by'=> $root_user->id, 'name'=>'root']);
    }
}
