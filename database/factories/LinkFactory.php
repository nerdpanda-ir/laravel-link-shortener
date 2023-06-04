<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Contracts\Factories\Link as Contract;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory implements Contract
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createdAt = $this->faker->dateTimeBetween(
            '-2 years',Carbon::now()->subDays(7)->toDateTime()
        );
        $updatedAt = null ;
        if ($this->faker->boolean){
            $forwardCreatedAt = (clone  $createdAt)->setTimestamp(
                $createdAt->getTimestamp() + rand(30,65535)
            );
            $updatedAt = $this->faker->dateTimeBetween($forwardCreatedAt,'now');
        }
        $linkData = [
            'original' => $this->faker->url() ,
            'summary' => Str::random(rand(4,24)) ,
            'created_at' => $createdAt ,
            'updated_at' => $updatedAt ,
        ];
        if ($this->faker->boolean)
            return $linkData;
        return array_merge(['view_count'=> rand(1,PHP_INT_MAX)] , $linkData);
    }
}
