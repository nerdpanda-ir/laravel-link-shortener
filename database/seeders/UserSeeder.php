<?php

namespace Database\Seeders;

use App\Contracts\Factories\User;
use App\Contracts\Seeder\User as Contract;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder implements Contract
{
    protected static int $count = 15;
    /**
     * Run the database seeds.
     */
    public function run(User $factory): void
    {
        $factory->modelName()::truncate();
        $factory->nerdPanda()->create();
        $factory->count(self::$count)->create();
    }
}
