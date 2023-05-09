<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Contracts\Factories\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory implements Role
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created_at = $this->faker->dateTimeBetween('-6 months','-7 days');
        $updated_at = null;
        if ($this->faker->boolean)
            $updated_at = $this->faker->dateTimeBetween(
                now()->setTimestamp(
                    $created_at->getTimestamp())->addSeconds(rand(30,5000)
                )
            );
        return [
            'created_at' => $created_at ,
            'updated_at' => $updated_at ,
        ];
    }
}
