<?php

namespace Database\Factories;

use App\Contracts\PermissionFactoryContract;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory implements PermissionFactoryContract
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createdAt = $this->faker->dateTimeBetween('-2 years',now()->subHours(2));
        $forwardCreatedAt = Carbon::createFromTimestamp($createdAt->getTimestamp())
                            ->addSeconds(rand(85,3600));
        $updatedAt = (
            ($this->faker->boolean) ? null : $this->faker->dateTimeBetween($forwardCreatedAt,)
        );
        return [
            'created_at' => $createdAt ,
            'updated_at' => $updatedAt
        ];
    }
}
