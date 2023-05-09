<?php

namespace Database\Seeders;

use App\Contracts\Seeder\User;
use App\Contracts\UserFactoryContract;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder implements User
{
    protected static int $count = 15;
    /**
     * Run the database seeds.
     */
    public function run(UserFactoryContract $factory): void
    {
        $factory->modelName()::truncate();
        $factory->nerdPanda()->create();
        $factory->count(self::$count)->create();
    }
}
