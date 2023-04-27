<?php

namespace Database\Factories;

use App\Contracts\PermissionFactoryContract;
use Illuminate\Database\Eloquent\Factories\Factory;
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
        $createdAt = $this->get_created_at( end: now()->subHours(3)->toDateTime());
        $forwardCreatedAt = $this->forwardDateTime($createdAt);
        $updatedAt = $this->get_updated_at($forwardCreatedAt);
        return [
            'created_at' => $createdAt ,
            'updated_at' => $updatedAt
        ];
    }
    protected function get_created_at(
        string|\DateTime $start = "-5 years" , string|\DateTime $end = 'now'
    ):\DateTime{
        return $this->faker->dateTimeBetween($start,$end);
    }
    protected function forwardDateTime(\DateTime $dateTime,int $min=30 , int $max = 3600):\DateTime {
        $timestamp = $dateTime->getTimestamp();
        return (clone $dateTime)->setTimestamp($timestamp+rand($min,$max));
    }
    protected function get_updated_at(\DateTimeInterface $createdAt):null|\DateTimeInterface {
        if ($this->faker->boolean)
            return $this->faker->dateTimeBetween($createdAt,'now');
        return null;
    }
}
