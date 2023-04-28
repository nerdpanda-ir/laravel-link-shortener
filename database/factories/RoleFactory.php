<?php

namespace Database\Factories;

use App\Contracts\RoleFactoryContract;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory implements RoleFactoryContract
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
