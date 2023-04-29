<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Contracts\PermissionFactoryContract;
use Database\Factories\RoleFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call([
            'contract.seeder.user' ,
            'contract.seeder.permission' ,
            'contract.seeder.role' ,
            'contract.seeder.permissionRole' ,
            'contract.seeder.roleUser' ,
        ]);
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
